<?php
/**
 * Created by PhpStorm.
 * User: Aza
 * Date: 06.06.14
 * Time: 16:50
 */

namespace Cinemax\CinemaxBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Cinemax\CinemaxBundle\Form\SearchType;

class SearchController extends Controller{

    public function indexAction(){

        $form = $this->createForm(new SearchType());
        $request = $this->getRequest();
        if ($request->isMethod('GET')) {
            $form->submit($request);
            $searchText =$form->get('search')->getData();
            $repository = $this->getDoctrine()->getRepository('CinemaxBundle:Discs');
            $discs = $repository->searchDiscs($searchText);
            $paginator = $this -> get('knp_paginator');
            $pagination = $paginator
                ->paginate($discs, $this->get('request')->query->get('page',1),12);
            $count = count($pagination);
            return $this -> render('CinemaxBundle:Search:index.html.twig', array('count'=> $count, 'pagination'=>$pagination, 'searchText'=>$searchText, 'form'=>$form->createView()));
        }
    }

    public function showFormAction(){

        $form = $this->createForm(new SearchType);

        return $this -> render('CinemaxBundle:Search:searchForm.html.twig', array('form'=>$form->createView()));
    }

} 