<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Aza
 * Date: 18.06.13
 * Time: 13:26
 * To change this template use File | Settings | File Templates.
 */

namespace Cinemax\CinemaxBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Cinemax\CinemaxBundle\Entity;

class FormatsAdmin extends Admin {

    protected function configureShowField(ShowMapper $showmapper)
    {
        $showmapper
            ->add('id',null, array('label'=>'id'))
            ->add('name',null, array('label'=> 'Формат'));
    }

    protected function configureFormFields(FormMapper $formmapper)
    {
        $formmapper
            ->with('Добавить формат')
            ->add('name',null, array('label'=>'Формат'));
    }

    protected function configureListFields(ListMapper $listmapper)
    {
        $listmapper
            ->add('id', null, array('label' => 'ID'))
            ->addIdentifier('name', null, array('label' => 'Формат'));
    }

}