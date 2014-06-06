<?php
/**
 * Created by PhpStorm.
 * User: Aza
 * Date: 06.01.14
 * Time: 0:30
 */

namespace Cinemax\CinemaxBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Route\RouteCollection;
class VisitsAdmin extends Admin{

    protected function configureShowField(ShowMapper $showmapper)
    {
        $showmapper
            ->add('visitId',null, array('label'=>'id'))
            ->add('date',null, array('label'=> 'Дата посещения'))
            ->add('hosts', null, array('label' => 'Количество уникальных посетителей'))
            ->add('views', null, array('label' => 'Количество просмотров'));
    }

    protected function configureListFields(ListMapper $listmapper)
    {
        $listmapper
            ->add('date',null, array('label'=> 'Дата посещения'))
            ->add('hosts', null, array('label' => 'Количество уникальных посетителей'))
            ->add('views', null, array('label' => 'Количество просмотров'));
    }

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->remove('create');
    }
} 