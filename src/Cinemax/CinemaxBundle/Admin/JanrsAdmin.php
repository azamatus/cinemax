<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Aza
 * Date: 12.06.13
 * Time: 18:34
 * To change this template use File | Settings | File Templates.
 */

namespace Cinemax\CinemaxBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Cinemax\CinemaxBundle\Entity;

class JanrsAdmin extends Admin {

    protected function configureShowField(ShowMapper $showmapper)
    {
        $showmapper
            ->add('id',null, array('label'=>'id'))
            ->add('name',null, array('label'=> 'Жанр'));
    }

    protected function configureFormFields(FormMapper $formmapper)
    {
        $formmapper
            ->with('Добавить жанр')
            ->add('name',null, array('label'=>'Жанр'));
    }

    protected function configureListFields(ListMapper $listmapper)
    {
        $listmapper
            ->addIdentifier('id', null, array('label' => 'ID'))
            ->add('name', null, array('label' => 'Жанр'));

    }
}