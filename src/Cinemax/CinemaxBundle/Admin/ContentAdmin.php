<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Aza
 * Date: 12.06.13
 * Time: 15:06
 * To change this template use File | Settings | File Templates.
 */

namespace Cinemax\CinemaxBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\AdminBundle\Show\ShowMapper;
use Cinemax\CinemaxBundle\Entity;

class ContentAdmin extends Admin{

    protected function configureShowField(ShowMapper $showmapper)
    {
        $showmapper
            ->add('id', null, array('label' => 'ID'))
            ->add('name', null, array('label' => 'Название'))
            ->add('description', null, array('label' => 'Описание'))
            ->add('active', null, array('label' => 'Активен'))
            ->add('quantityFilms', null , array('label' => 'Количество фильмов'))
            ->add('quantitySeries', null , array('label' => 'Количество серий'))
            ->add('quantityClips', null , array('label' => 'Количество клипов'))
            ->add('poster', 'sonata_media_type', array('label' => 'Постер', 'provider' => 'sonata.media.provider.image', 'context' => 'posters'))
            ->add('format', null, array('label' => 'Формат'))
            ->add('country', null, array('label' => 'Страна'))
            ->add('janr', null, array('label' => 'Жанр'))
            ->add('producer', null, array('label' => 'Производитель'))
            ->add('translation', null, array('label' => 'Перевод'))
            ->add('type', null, array('label' => 'Тип'))
            ->add('date','date',array('label'=>'Дата выпуска'));
    }

    protected function configureFormFields(FormMapper $formmapper)
    {
        $formmapper
            ->add('name', null, array('label' => 'Название'))
            ->add('description', 'textarea', array('label' => 'Описание', 'required' => false))
            ->add('active', null, array('label' => 'Активен'))
            ->add('quantityFilms', null , array('label' => 'Количество фильмов'))
            ->add('quantitySeries', null , array('label' => 'Количество серий'))
            ->add('quantityClips', null , array('label' => 'Количество клипов'))
            ->add('poster', 'sonata_type_model_list', array('required' => false, 'label' => 'Постеры'), array('link_parameters' => array('context' => 'posters')))
            ->add('format', null, array('label' => 'Формат'))
            ->add('price', null , array('label' => 'Цена'))
            ->add('country', null, array('label' => 'Страна'))
            ->add('janr', null, array('label' => 'Жанр'))
            ->add('producer', null, array('label' => 'Производитель'))
            ->add('translation', null, array('label' => 'Перевод'))
            ->add('type', null, array('label' => 'Тип'))
            ->add('date','date',array('label'=>'Дата выпуска'));
    }

    protected function configureListFields(ListMapper $listmapper)
    {
        $listmapper
            ->add('id', null, array('label' => 'ID'))
            ->addIdentifier('name', null, array('label' => 'Название'))
            ->addIdentifier('description', null, array('label' => 'Описание'))
            ->add('active', 'boolean', array('editable' => true,'label' => 'Активен'))
            ->addIdentifier('quantityFilms', null, array('editable' => true,'label' => 'Количество фильмов'))
            ->addIdentifier('quantitySeries', null, array('editable' => true,'label' => 'Количество серий'))
            ->addIdentifier('quantityClips', null, array('editable' => true,'label' => 'Количество клипов'))
            ->add('format', null , array('editable' => true,'label' => 'Формат'))
            ->add('price', null , array('editable' => true,'label' => 'Цена'))
            ->add('country', null, array('label' => 'Страна'))
            ->add('janr', null, array('label' => 'Жанр'))
            ->add('producer', null, array('label' => 'Производитель'))
            ->add('translation', null, array('label' => 'Перевод'))
            ->add('type', null, array('label' => 'Тип'))
            ->add('date','date',array('label'=>'Дата выпуска'));
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name', null, array('label' => 'Название'));

    }
}