<?php

namespace Cinemax\HeaderSliderBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SliderController extends Controller
{
    public function getSliderAction()
    {
        $sliders = $this->getDoctrine()
            ->getRepository("CinemaxHeaderSliderBundle:SliderHeader")
            ->findAll();

        return $this->render('CinemaxHeaderSliderBundle:Slider:header_slider.html.twig', array('sliders'=>$sliders));
    }
}
