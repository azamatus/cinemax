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
                9
            );
        return $this->render('CinemaxVideosBundle:Videos:trailers.html.twig', array('pagination'=>$pagination));
    }

    public function showTrailerAction($id){

        $trailer = $this->getDoctrine()
            ->getRepository('CinemaxVideosBundle:Videos')
            ->findOneBy(array('id'=>$id));

        return $this->render('CinemaxVideosBundle:Videos:show_popup_trailer.html.twig', array('trailer'=>$trailer));
    }

    public function moviesCatalogAction(){

        $movies = $this->getDoctrine()
            ->getRepository('CinemaxVideosBundle:Movies')
            ->findBy(array('active'=>true), array('id'=>'DESC'));

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator
            ->paginate($movies,
                $this->get('request')->query->get('page', 1),
                12
            );
        return $this->render('CinemaxVideosBundle:Videos:movies_catalog.html.twig', array('pagination'=>$pagination));
    }

    public function getJanrsAction(){

        $janrs = $this->getDoctrine()
            ->getRepository('CinemaxBundle:Janrs')
            ->findBy(array(), array('name'=>'ASC'));

        return $this->render('CinemaxVideosBundle:Videos:janrs.html.twig', array('janrs'=>$janrs));
    }

    public function watchMovieAction($id){

        $movieRepository = $this->getDoctrine()
            ->getRepository('CinemaxVideosBundle:Movies');
        $movies = $movieRepository->findOneBy(array('id'=>$id));

        $movieRepository->incrementViews($movies->getId());
        return $this->render('CinemaxVideosBundle:Videos:watch_movie.html.twig', array('movie'=>$movies));
    }

}
