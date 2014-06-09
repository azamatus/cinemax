<?php

namespace Cinemax\VideosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class VideosController extends Controller
{
    public function indexAction()
    {
        $videos = $this->getDoctrine()
            ->getRepository('CinemaxVideosBundle:Videos')
            ->findBy(array('active'=> true), array('id'=>'DESC') );

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator
            ->paginate($videos,
                $this->get('request')->query->get('page', 1),
                12
            );
        return $this->render('CinemaxVideosBundle:Videos:index.html.twig', array('pagination'=>$pagination));
    }

    public function showTrailerAction($id){

        $trailer = $this->getDoctrine()
            ->getRepository('CinemaxVideosBundle:Videos')
            ->findOneBy(array('id'=>$id));

        return $this->render('CinemaxVideosBundle:Videos:show_popup_trailer.html.twig', array('trailer'=>$trailer));
    }
}
