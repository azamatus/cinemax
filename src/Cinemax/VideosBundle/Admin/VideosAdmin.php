<?php
/**
 * Created by PhpStorm.
 * User: Aza
 * Date: 09.06.14
 * Time: 17:36
 */

namespace Cinemax\VideosBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class VideosAdmin extends Admin{

    protected function configureShowField(ShowMapper $showmapper)
    {
        $showmapper
            ->add('id')
            ->add('name')
            ->add('active')
            ->add('description')
            ->add('video')
        ;
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', null, array('label'=> 'Название', 'required'=>true))
            ->add('description', null, array('label'=> 'Описание'))
            ->add('active', null, array('label'=> 'Активен'))
            ->add('video', 'sonata_type_model_list', array('label'=> 'Трейлер','required' => true), array('link_parameters' => array('context' => 'videos')))
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name', null, array('label'=>'Название'))
            ->addIdentifier('description', null, array('label'=>'Описание'))
            ->add('active', 'boolean', array('label'=>'Активен','editable' => true))
        ;
    }
} 