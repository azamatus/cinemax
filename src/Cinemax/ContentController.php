<?php

namespace Cinemax\CinemaxBundle\Controller;

use Cinemax\CinemaxBundle\Entity;
use Cinemax\CinemaxBundle\Entity\Ips;
use Cinemax\CinemaxBundle\Entity\Visits;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ContentController  extends Controller{

    public function getCatalogAction()
    {
        $repository = $this ->getDoctrine()
            ->getRepository("CinemaxBundle:Discs");

        $newdiscs = $repository-> getLastUpdatedDiscs();
        return $this->render('CinemaxBundle:Content:catalog.html.twig', array('discs' => $newdiscs));
    }

    public function getSliderAction()
    {

        $discs = $this -> getDoctrine()
            ->getRepository("CinemaxBundle:Discs")
            ->findAll();
        return $this->render('CinemaxBundle:Content:get_slider.html.twig', array('discs' => $discs));
    }

    public function getAllCatalogAction(){

        $ips = new Ips();
        $visits = new Visits();
        $em = $this -> getDoctrine() -> getManager();
        $visitor_ip = $_SERVER['REMOTE_ADDR'];
        $date = new \DateTime();
        $visits_repo = $em -> getRepository("CinemaxBundle:Visits");
        $ips_repo = $em -> getRepository("CinemaxBundle:Ips");
        $visit_id = $visits_repo -> getIdByDate($date);
        if(empty($visit_id)){
            $ips_repo -> clearIps();
            $ips -> setIpAddress($visitor_ip);
            $visits -> setDate($date);
            $visits -> setHosts(1);
            $visits -> setViews(1);
            $em->persist($ips);
            $em->persist($visits);
            $em->flush();
        }
        else{
            $current_ip = $ips_repo -> getIp($visitor_ip);
            if(!empty($current_ip)){
                $visits_repo -> updateViews($date);
            }
            else {
                $ips -> setIpAddress($visitor_ip);
                $visits_repo -> updateHosts($date);
                $em->persist($ips);
                $em->flush();
            }
        }
        $discs = $this -> getDoctrine()
            ->getRepository("CinemaxBundle:Discs")
            ->findAll();

        $paginator = $this -> get('knp_paginator');

        $pagination = $paginator
            ->paginate($discs, $this->get('request')->query->get('page',1),12);


        return $this -> render('CinemaxBundle:Content:allCatalog.html.twig',array('pagination' => $pagination, 'title' => 'Весь каталог'));

    }

    public function sortByTypeAction($type)
    {
        $repository = $this -> getDoctrine()
               ->getRepository("CinemaxBundle:Discs");

        $sortedDiscs = $repository -> doSort($type);

        $paginator = $this -> get('knp_paginator');

        $pagination = $paginator
            ->paginate($sortedDiscs, $this->get('request')->query->get('page',1),12);
        return $this->render("CinemaxBundle:Content:allCatalog.html.twig", array('pagination' => $pagination, 'title' => 'Весь каталог'));
    }

    public function getNoveltiesAction()
    {
        $ips = new Ips();
        $visits = new Visits();
        $em = $this -> getDoctrine() -> getManager();
        $visitor_ip = $_SERVER['REMOTE_ADDR'];
        $date = new \DateTime();
        $visits_repo = $em -> getRepository("CinemaxBundle:Visits");
        $ips_repo = $em -> getRepository("CinemaxBundle:Ips");
        $visit_id = $visits_repo -> getIdByDate($date);
        if(empty($visit_id)){
            $ips_repo -> clearIps();
            $ips -> setIpAddress($visitor_ip);
            $visits -> setDate($date);
            $visits -> setHosts(1);
            $visits -> setViews(1);
            $em->persist($ips);
            $em->persist($visits);
            $em->flush();
        }
        else{
            $current_ip = $ips_repo -> getIp($visitor_ip);
            if(!empty($current_ip)){
                $visits_repo -> updateViews($date);
            }
            else {
                $ips -> setIpAddress($visitor_ip);
                $visits_repo -> updateHosts($date);
                $em->persist($ips);
                $em->flush();
            }
        }
        $repository = $this -> getDoctrine()
            ->getRepository("CinemaxBundle:Discs");

        $novelties = $repository->getLastUpdatedDiscs();

        $paginator = $this -> get('knp_paginator');
        $pagination = $paginator
            ->paginate($novelties, $this->get('request')->query->get('page',1),12);


        return $this->render('CinemaxBundle:Content:allCatalog.html.twig', array('pagination' => $pagination, 'title' => 'Новинки'));

    }

}