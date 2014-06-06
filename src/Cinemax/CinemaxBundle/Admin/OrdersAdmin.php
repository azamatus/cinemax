<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Aza
 * Date: 14.09.13
 * Time: 20:13
 * To change this template use File | Settings | File Templates.
 */

namespace Cinemax\CinemaxBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Cinemax\CinemaxBundle\Entity;


class OrdersAdmin extends Admin{

    protected function configureShowField(ShowMapper $showmapper)
    {
        $showmapper
            ->add('id',null, array('label'=>'id'))
            ->add('binClient',null, array('label'=> 'Клиент'))
            ->add('amount', null, array('label' => 'Количество'))
            ->add('disc', null, array('label' => 'Диск'))
            ->add('coast', null, array('label' => 'Цена'));
    }

    protected function configureFormFields(FormMapper $formmapper)
    {
        $formmapper
            ->add('binClient',null, array('label'=> 'Клиент'))
            ->add('amount', null, array('label' => 'Количество'))
            ->add('disc', null, array('label' => 'Диск'))
            ->add('coast', null, array('label' => 'Цена'));
    }

    protected function configureListFields(ListMapper $listmapper)
    {
        $listmapper
            ->add('id',null, array('label'=>'id'))
            ->add('binClient',null, array('label'=> 'Клиент'))
            ->add('amount', null, array('label' => 'Количество'))
            ->add('disc', null, array('label' => 'Диск'))
            ->add('coast', null, array('label' => 'Цена'));

    }
}