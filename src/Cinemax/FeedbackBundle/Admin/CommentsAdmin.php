<?php
/**
 * Created by PhpStorm.
 * User: Aza
 * Date: 11.06.14
 * Time: 20:52
 */

namespace Cinemax\FeedbackBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\AdminBundle\Show\ShowMapper;


class CommentsAdmin extends Admin {

    protected function configureShowField(ShowMapper $showmapper)
    {
        $showmapper
            ->add('id')
            ->add('author')
            ->add('comment')
            ->add('created')
            ->add('active')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('author', null, array('label'=>'Автор'))
            ->add('comment', null, array('label'=>'Комментарий'))
            ->add('created', null, array('label'=>'Дата'))
            ->add('active', 'boolean', array('label'=>'Активен','editable' => true))
        ;
    }
    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->remove('create');
        $collection->add('answer');
    }
}