<?php
/**
 * Created by PhpStorm.
 * User: Aza
 * Date: 10.06.14
 * Time: 19:10
 */

namespace Cinemax\VideosBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class MoviesAdmin extends Admin{

    protected function configureShowField(ShowMapper $showmapper)
    {
        $showmapper
            ->add('id')
            ->add('name')
            ->add('url')
            ->add('janrs')
            ->add('directors')
            ->add('actors')
            ->add('countries')
            ->add('description')
            ->add('year')
            ->add('views')
        ;
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', null, array('label'=> 'Название', 'required'=>true))
            ->add('url', null, array('label'=> 'Ссылка на фильм', 'required'=>true))
            ->add('janrs', null, array('label'=>'Жанр'))
            ->add('directors', null, array('label'=>'Режиссер'))
            ->add('actors', null, array('label'=>'Актеры'))
            ->add('countries', null, array('label'=>'Страны'))
            ->add('year', null, array('label'=>'Год', 'required'=>true))
            ->add('description', 'ckeditor', array('label'=>'Описание', 'attr' => array('class' => 'span10', 'rows' => 20),'config'=>array('width'=>'700px','height'=>'345px','resize_enabled'=>false,'resize_maxHeight' => '345px','resize_minHeight' => '345px')))
            ->add('active', null, array('label'=> 'Активен'))
            ->add('poster', 'sonata_type_model_list', array('label'=> 'Постер','required' => true), array('link_parameters' => array('context' => 'movies_poster')))
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name', null, array('label'=>'Название'))
            ->addIdentifier('janrs', null, array('label'=>'Жанры'))
            ->addIdentifier('actors', null, array('label'=>'Актеры'))
            ->addIdentifier('directors', null, array('label'=>'Режиссер'))
            ->addIdentifier('countries', null, array('label'=>'Страны'))
            ->addIdentifier('views', null, array('label'=>'Просмотры'))
            ->addIdentifier('year', null, array('label'=>'Год'))
            ->add('active', 'boolean', array('label'=>'Активен','editable' => true))
        ;
    }
} 