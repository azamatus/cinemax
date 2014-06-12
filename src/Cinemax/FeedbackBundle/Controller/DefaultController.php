<?php

namespace Cinemax\FeedbackBundle\Controller;

use Symfony\Bridge\Propel1\Tests\Form\DataTransformer\CollectionToArrayTransformerTest;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Cinemax\FeedbackBundle\Form\FeedbackType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Cinemax\FeedbackBundle\Entity\Feedback;
use Cinemax\FeedbackBundle\Form\CommentsType;
use Cinemax\FeedbackBundle\Entity\Comments;

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

           $message = \Swift_Message::newInstance()
               ->setSubject('Письмо в обратную связь')
               ->setFrom($this->container->getParameter('email_from'))
               ->setTo($this->container->getParameter('email_to'))
               ->setBody(
                   $this->getMessage($entity),
                   'text/html'
               )
            ;
           $this->get('mailer')->send($message);

           return $this->render('CinemaxFeedbackBundle:Default:sended.html.twig');
       }

        return $this->render('CinemaxFeedbackBundle:Default:index.html.twig', array('form' => $form->createView()));
    }

    public function getMessage(Feedback $entity)
    {
        return "Сообщение от ".$entity->getEmail().", \n".$entity->getMessage();
    }

    public function saveCommentAction(Request $request,$id){

        $comment = new Comments();

        $commentForm = $this->createForm(new CommentsType(), $comment);
        $commentForm->handleRequest($request);
        if($commentForm->isValid()){
            $em = $this->getDoctrine()->getManager();
            $movie = $em->getRepository('CinemaxVideosBundle:Movies')->find($id);
            $movie->addComment($comment);
            $comment->setCreated(new \DateTime('now'));
            $comment->setActive(true);
            $comment->setMovie($movie);

            $em->persist($movie);
            $em->flush();
            return $this->redirect($this->generateUrl('movie_watch', array('id'=>$id)));
        }

        return $this->render('CinemaxFeedbackBundle:Comment:comment.html.twig',array('commentForm'=>$commentForm->createView(),'movie_id'=>$id));
    }

    public function showCommentsAction($id){

        $comments = $this->getDoctrine()
            ->getRepository('CinemaxFeedbackBundle:Comments')
            ->findBy(array('movie'=>$id, 'active'=>true));

        return $this->render('CinemaxVideosBundle:Videos:show_comments.html.twig', array('comments'=>$comments));
    }
}
