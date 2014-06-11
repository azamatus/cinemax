<?php
/**
 * Created by PhpStorm.
 * User: Aza
 * Date: 11.06.14
 * Time: 13:43
 */

namespace Cinemax\VideosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Cinemax\VideosBundle\Form\SearchMoviesType;

class SearchMovieController extends Controller{

    public function indexAction(){

        $form = $this->createForm(new SearchMoviesType());
        $request = $this->getRequest();
        if ($request->isMethod('GET')) {
            $form->submit($request);
            $searchText =$form->get('search')->getData();
            $repository = $this->getDoctrine()->getRepository('CinemaxVideosBundle:Movies');
            $movies = $repository->searchMovies($searchText);
            $paginator = $this -> get('knp_paginator');
            $pagination = $paginator
                ->paginate($movies, $this->get('request')->query->get('page',1),12);
            $count = count($pagination);
            return $this -> render('CinemaxVideosBundle:Search:index.html.twig', array('count'=> $count, 'pagination'=>$pagination, 'searchText'=>$searchText, 'form'=>$form->createView()));
        }
    }

    public function showFormAction(){

        $form = $this->createForm(new SearchMoviesType());

        return $this -> render('CinemaxVideosBundle:Search:searchForm.html.twig', array('form'=>$form->createView()));
    }

} 