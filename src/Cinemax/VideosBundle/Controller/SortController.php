<?php
/**
 * Created by PhpStorm.
 * User: Aza
 * Date: 11.06.14
 * Time: 9:59
 */

namespace Cinemax\VideosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SortController extends Controller{

    public function sortByJanrAction($id){

        $janrs = $this->getDoctrine()
            ->getRepository('CinemaxBundle:Janrs')
            ->find($id);
        $janr_name = $janrs->getName();
        $movies = $janrs->getMovies();

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator
            ->paginate($movies,
                $this->get('request')->query->get('page', 1),
                12
            );
        return $this->render('CinemaxVideosBundle:Videos:sorted_movies.html.twig', array('pagination'=>$pagination, 'name'=>'Жанр '.$janr_name));
    }

    public function sortByDirectorAction($id){

        $directors = $this->getDoctrine()
            ->getRepository('CinemaxVideosBundle:Directors')
            ->find($id);

        $director_name = $directors->getName();
        $movies = $directors->getMovies();
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator
            ->paginate($movies,
                $this->get('request')->query->get('page', 1),
                12
            );
        return $this->render('CinemaxVideosBundle:Videos:sorted_movies.html.twig', array('pagination'=>$pagination, 'name'=>'Режиссер '.$director_name));
    }

    public function sortByCountriesAction($id){

        $countries = $this->getDoctrine()
            ->getRepository('CinemaxBundle:Countries')
            ->find($id);

        $country_name = $countries->getName();
        $movies = $countries->getMovies();
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator
            ->paginate($movies,
                $this->get('request')->query->get('page', 1),
                12
            );
        return $this->render('CinemaxVideosBundle:Videos:sorted_movies.html.twig', array('pagination'=>$pagination, 'name'=>'Страна '.$country_name));
    }

    public function sortByActorsAction($id){

        $actors = $this->getDoctrine()
            ->getRepository('CinemaxVideosBundle:Actors')
            ->find($id);

        $actor_name = $actors->getName();
        $movies = $actors->getMovies();
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator
            ->paginate($movies,
                $this->get('request')->query->get('page', 1),
                12
            );
        return $this->render('CinemaxVideosBundle:Videos:sorted_movies.html.twig', array('pagination'=>$pagination, 'name'=>'Актер '.$actor_name));
    }

    public function sortByYearAction($year){

        $movies = $this->getDoctrine()
            ->getRepository('CinemaxVideosBundle:Movies')
            ->findBy(array('year'=>$year));
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator
            ->paginate($movies,
                $this->get('request')->query->get('page', 1),
                12
            );
        return $this->render('CinemaxVideosBundle:Videos:sorted_movies.html.twig', array('pagination'=>$pagination, 'name'=>'Год выпуска '.$year));
    }

} 