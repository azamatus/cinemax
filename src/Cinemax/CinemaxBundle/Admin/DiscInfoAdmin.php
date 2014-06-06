<?php
/**
 * Created by PhpStorm.
 * User: Aza
 * Date: 23.01.14
 * Time: 0:40
 */

namespace Cinemax\CinemaxBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class DiscInfoAdmin extends Admin{

    protected function configureShowField(ShowMapper $showmapper)
    {
        $showmapper
            ->add('id',null, array('label'=>'id'))
            ->add('content',null, array('label'=> 'Информация'));


    }

    protected function configureListFields(ListMapper $listmapper)
    {
        $listmapper
            ->addIdentifier('id',null, array('label'=>'id'))
            ->addIdentifier('disc',null,array('label'=>'Название диска'));
    }
    protected function configureFormFields(FormMapper $formmapper)
    {
        $formmapper
            ->add('disc', null, array('label'=>'Название диска'))
            ->add('content', 'ckeditor', array('attr' => array('class' => 'span10', 'rows' => 20),'config'=>array('width'=>'700px','height'=>'345px','resize_enabled'=>false,'resize_maxHeight' => '345px','resize_minHeight' => '345px')));
    }

} 