<?php
/**
 * Created by PhpStorm.
 * User: Aza
 * Date: 11.06.14
 * Time: 0:05
 */

namespace Cinemax\VideosBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class ActorsAdmin extends Admin{

    protected function configureShowField(ShowMapper $showmapper)
    {
        $showmapper
            ->add('id',null, array('label'=>'id'))
            ->add('name',null, array('label'=> 'Жанр'));
    }

    protected function configureFormFields(FormMapper $formmapper)
    {
        $formmapper
            ->with('Добавить актера')
            ->add('name',null, array('label'=>'Актер'));
    }

    protected function configureListFields(ListMapper $listmapper)
    {
        $listmapper
            ->addIdentifier('id', null, array('label' => 'ID'))
            ->addIdentifier('name', null, array('label' => 'Актер'));

    }
} 