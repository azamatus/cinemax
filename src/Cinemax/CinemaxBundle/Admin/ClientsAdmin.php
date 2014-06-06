<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Aza
 * Date: 14.09.13
 * Time: 19:51
 * To change this template use File | Settings | File Templates.
 */

namespace Cinemax\CinemaxBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Cinemax\CinemaxBundle\Entity;


class ClientsAdmin extends Admin{

    protected function configureShowField(ShowMapper $showmapper)
    {
        $showmapper
            ->add('id',null, array('label'=>'id'))
            ->add('fio',null, array('label'=> 'ФИО'))
            ->add('phone',null, array('label' => 'Телефон'))
            ->add('email',null,array('label' => 'email'))
            ->add('address',null, array('label' => 'Адрес'))
            ->add('active', 'boolean', array('label' => 'Активен'))
            ->add('dateOrder', null, array('label' => 'Время заказа'));
    }

    protected function configureFormFields(FormMapper $formmapper)
    {
        $formmapper
            ->with('Добавить клиента')
            ->add('fio',null, array('label'=> 'ФИО'))
            ->add('phone',null, array('label' => 'Телефон'))
            ->add('email',null,array('label' => 'email'))
            ->add('address',null, array('label' => 'Адрес'))
            ->add('active', null, array('label' => 'Активен'));
    }

    protected function configureListFields(ListMapper $listmapper)
    {
        $listmapper
            ->add('id',null, array('label'=>'id'))
            ->addIdentifier('fio',null, array('label'=> 'ФИО'))
            ->addIdentifier('phone',null, array('label' => 'Телефон'))
            ->addIdentifier('email',null,array('label' => 'email'))
            ->addIdentifier('address',null, array('label' => 'Адрес'))
            ->add('active', 'boolean', array('editable' => true, 'label' => 'Активен'))
            ->add('dateOrder', null, array('label' => 'Время заказа'));
    }

}