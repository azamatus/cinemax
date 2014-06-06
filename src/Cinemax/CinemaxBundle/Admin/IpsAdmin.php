<?php
/**
 * Created by PhpStorm.
 * User: Aza
 * Date: 06.01.14
 * Time: 0:40
 */

namespace Cinemax\CinemaxBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class IpsAdmin extends Admin{

    protected function configureShowField(ShowMapper $showmapper)
    {
        $showmapper
            ->add('ipId',null, array('label'=>'id'))
            ->add('ipAddress',null, array('label'=> 'Ip адрес'));

    }

    protected function configureListFields(ListMapper $listmapper)
    {
        $listmapper
            ->add('ipAddress',null, array('label'=> 'Ip адрес посетителя'));
    }

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->remove('create');
    }

} 