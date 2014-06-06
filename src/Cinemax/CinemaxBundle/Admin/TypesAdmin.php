<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Aza
 * Date: 12.06.13
 * Time: 19:45
 * To change this template use File | Settings | File Templates.
 */

namespace Cinemax\CinemaxBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class TypesAdmin extends Admin{

    protected function configureShowField(ShowMapper $showmapper)
    {
        $showmapper
            ->add('id',null, array('label'=>'id'))
            ->add('name',null, array('label'=> 'Тип'));
    }

    protected function configureFormFields(FormMapper $formmapper)
    {
        $formmapper
            ->with('Добавить тип')
            ->add('name',null, array('label'=>'Тип'));
    }

    protected function configureListFields(ListMapper $listmapper)
    {
        $listmapper
            ->add('id', null, array('label' => 'ID'))
            ->addIdentifier('name', null, array('label' => 'Тип'));

    }
}