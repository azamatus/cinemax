<?php

namespace Cinemax\FeedbackBundle\Controller;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Request;
use Sonata\AdminBundle\Controller\CRUDController;

class FeedbackAdminController extends CRUDController
{
    public function answerAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository("CinemaxFeedbackBundle:Feedback")->find($request->query->get('id',0));
        if (!$entity){
            throw $this->createNotFoundException('Сообщение не найдено');
        }

        $form = $this->createFormBuilder()
            ->add('title', 'text', array('label'=>'Заголовок письма *', 'attr'=>array('value'=>"Ответ на ваш вопрос")))
            ->add('answer', 'textarea', array('label'=>'Сообщение *'))
            ->getForm();

        $form->handleRequest($request);
        if ($form->isValid()){
            $data = $form->getData();
            $message = \Swift_Message::newInstance()
                ->setSubject($data['title'])
                ->setFrom($this->container->getParameter('email_from'))
                ->setTo($entity->getEmail())
                ->setBody(
                    $data['answer'],
                    'text/html'
                )
            ;
            $entity->setAnswered(true);
            $entity->setAnsweredDate(new \DateTime());
            $entity->setAnswer($data['answer']);
            $em->flush();
            $this->get('mailer')->send($message);
            $this->container->get('session')->getFlashBag()->add('success', 'Письмо пользователю отправлено');
        }


        return $this->render('CinemaxFeedbackBundle:FeedbackAdmin:index.html.twig', array(
            'entity'    => $entity,
            'form'      => $form->createView()
        ));
    }
}
