<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Aza
 * Date: 31.08.13
 * Time: 20:00
 * To change this template use File | Settings | File Templates.
 */

namespace Cinemax\CinemaxBundle\Controller;

use Application\Sonata\UserBundle\Entity\User;
use Cinemax\CinemaxBundle\Entity\BinClients;
use Cinemax\CinemaxBundle\Entity\BinOrders;
use Cinemax\CinemaxBundle\Entity\Discs;
use Cinemax\CinemaxBundle\Entity\DiscsRepository;
use Cinemax\CinemaxBundle\Form\Type\BinClientsFormType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;



class BinController extends Controller{

    public function binAction()
    {
        /* @var DiscsRepository $repository */
        $request = $this->getRequest();
        $discsIds = $request->cookies->get("cookieDiscs");
        $discs = null;
        if (!empty($discsIds)) {
            $repository = $this->getDoctrine()->getRepository("CinemaxBundle:Discs");
            $discs = $repository->getDiscsById($discsIds);
        }
        return $this->render('CinemaxBundle:Bin:discsInBin.html.twig', array(
            'discs' => $discs,
            'discsCount' => $discsIds
        ));
    }


    public function addAjaxBinAction($id)
    {
        if($this->getRequest()->isXmlHttpRequest()) {

            $discs = $this->getDoctrine()
                ->getRepository("CinemaxBundle:Discs")
                ->find($id);

            $request = $this -> getRequest();

            if($discs) {
                $disc = $request -> cookies -> get("cookieDiscs");
                if(!isset($disc[$id]) || empty($disc[$id]))
                    $disc[$id] = 0;

                $amount = $request->query->get('amount',1);


                $discPage = $request->query->get('discPage');
                if($discPage == "true")
                    $disc[$id] = $amount;
                else
                    $disc[$id]++;
                $response = new Response();
                $cookie = new Cookie("cookieDiscs[$id]", $disc[$id], time() + 3600);
                $response->headers->setCookie($cookie);
                $response->send();
                return $this->render('CinemaxBundle:Bin:addAjaxBin.html.twig', array('disc' => $discs));
            }
            else {
                throw new \Exception('Что то не так');
            }
        }
        return new Response();
    }

    public function binFormAction(Request $request)
    {
        $response = new RedirectResponse($this->generateUrl('cinemax_bin_discs'));
        if ($request->isMethod('POST')) {
            $data = $request->request->get('bin');
            $discs = $request->cookies->get("cookieDiscs");
            if (!empty($discs)) {
                foreach ($discs as $key => $value) {
                    if (!isset($data[$key])) {
                        $response->headers->clearCookie("cookieDiscs[$key]");
                    }
                }
            }
            if (!empty($data)) {
                foreach ($data as $key => $value) {
                    if ($value == 0) {
                        $response->headers->clearCookie("cookieDiscs[$key]");
                    } else {
                        $cookie = new Cookie("cookieDiscs[$key]", $value, time() + 3600);
                        $response->headers->setCookie($cookie);
                    }
                }
            }
            if ($request->request->get('button_bin') == 'Оформить заказ') {
                $response->setTargetUrl($this->generateUrl('cinemax_order'));
            }
            elseif ($request->request->get('button_bin') == 'Продолжить выбор') {
                $response->setTargetUrl($this->generateUrl('cinemax_homepage'));
            }
        }
        return $response;
    }

    public function binOrderAction(Request $request)
    {
        /* @var User $user */
        /* @var DiscsRepository $repository */
        /* @var Discs $disc */
        $discsIds = $request->cookies->get("cookieDiscs");
        if (empty($discsIds)) {
            return $this->redirect($this->generateUrl("cinemax_bin_discs"));
        }

        $binClients = new BinClients();
        $user = $this->getUser();
        if (!is_null($user)) {
            $binClients->setUser($user);
            $binClients->setFio($user->getFullname());
            $binClients->setEmail($user->getEmail());
            $binClients->setPhone($user->getPhone());
            $binClients->setAddress($user->getAddress());

        }
        $form = $this->createForm(new BinClientsFormType(), $binClients);

        if ($request->isMethod("POST")){
            $form->handleRequest($request);
            if ($form->isValid()){
                $em = $this->getDoctrine()->getManager();
                $binClients->setDateOrder(new \DateTime());
                $em->persist($binClients);
                $em->flush();

                $repository = $this->getDoctrine()->getRepository("CinemaxBundle:Discs");
                $discs = $repository->getDiscsById($discsIds);
                if (!empty($discs)){
                    foreach ($discs as $disc){
                        $binOrders = new BinOrders();
                        $binOrders->setBinClient($binClients);
                        $binOrders->setDisc($disc);
                        $binOrders->setAmount($discsIds[$disc->getId()]);
                        $binOrders->setCoast($disc->getPrice());
                        $em->persist($binOrders);
                    }
                    $em->flush();
                }
                $this->sendEmail($binClients);
                $this->ClearCookies($discsIds);
                $this->get('session')->getFlashBag()->add('notice', 'Ваш заказ принят');
            }
        }
        return $this->render("CinemaxBundle:Bin:binOrderForm.html.twig", array("form" => $form->createView()));
    }

    public function delAjaxBinAction($id)
    {
        if ($this->getRequest()->isXmlHttpRequest()) {
            $request = $this->getRequest();

            $response = new Response();
            $cookie = new Cookie("cookieDiscs[$id]", null, 9999);
            $response->headers->setCookie($cookie);
            $response->send();

            return new JsonResponse(array());
        }
        return $this->redirect($this->generateUrl("cinemax_homepage"));
    }


    private function ClearCookies($discsIds)
    {
        $response = new Response();
        foreach ($discsIds as $key=>$value)
            $response->headers->clearCookie("cookieDiscs[$key]");
        $response->send();
    }


    private function sendEmail(BinClients $binClients)
    {
        $repository = $this->getDoctrine()->getRepository("CinemaxBundle:BinOrders");
        $orders=$repository->getClientOrders($binClients->getId());
        $message = \Swift_Message::newInstance()
            ->setSubject('Новый заказ')
            ->setFrom($this->container->getParameter('email_from'))
            ->setTo($this->container->getParameter('email_to'))
            ->setBody(
                $this->get('templating')->render(
                    'CinemaxBundle:Bin:email.txt.twig',
                    array('binclient' => $binClients,'orders' => $orders)
                )
            )
            ->setContentType("text/html")
        ;
        $this->get('mailer')->send($message);
    }
}