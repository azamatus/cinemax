<?php

namespace Cinemax\FeedbackBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Cinemax\FeedbackBundle\Form\FeedbackType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Cinemax\FeedbackBundle\Entity\Feedback;

class DefaultController extends Controller
{
    public function indexAction(Request $request){

        $entity = new Feedback();
        $form = $this->createForm(new FeedbackType(), $entity);

        $form->handleRequest($request);
        if($form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em -> persist($entity);
            $em -> flush();

            return $this->render('CinemaxFeedbackBundle:Default:sended.html.twig');
        }

        return $this->render('CinemaxFeedbackBundle:Default:index.html.twig', array('form' => $form->createView()));
    }
}
