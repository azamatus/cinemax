<?php

namespace Cinemax\MenuBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Cinemax\CinemaxBundle\Entity;

class MenuController extends Controller
{
    public function indexAction()
    {
        return $this->render('CinemaxMenuBundle:LeftMenu:header_menu.html.twig');
    }
}
