<?php

namespace Cinemax\CinemaxBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Cinemax\CinemaxBundle\Entity;
use Cinemax\CinemaxBundle\Entity\Ips;
use Cinemax\CinemaxBundle\Entity\Visits;
//use Symfony\Component\HttpFoundation\Request;
//use Symfony\Component\Validator\Constraints\Ip;

class MainController extends Controller
{
    public function indexAction()
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
        return $this->render('CinemaxBundle:content:content.html.twig');
    }
}
