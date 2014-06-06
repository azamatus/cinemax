<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Aza
 * Date: 16.05.13
 * Time: 23:04
 * To change this template use File | Settings | File Templates.
 */

namespace Cinemax\HeaderSliderBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Cinemax\HeaderSliderBundle\Entity;


class SliderAdmin  extends Admin
{
    public function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('title')
            ->add('content');
    }

    public function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('General')
            ->add('title')
            ->add('content', 'ckeditor', array('attr' => array('class' => 'span10', 'rows' => 20),'config'=>array('width'=>'700px','height'=>'345px','resize_enabled'=>false,'resize_maxHeight' => '345px','resize_minHeight' => '345px')))
            ->end();
    }

    public function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('title')
            ->add('content');
    }

}