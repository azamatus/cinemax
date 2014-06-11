<?php
/**
 * Created by PhpStorm.
 * User: Aza
 * Date: 06.06.14
 * Time: 17:48
 */

namespace Cinemax\CinemaxBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SearchType extends AbstractType {

     public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('search', null,array('attr'=>array('placeholder'=>"Поиск дисков...")));
    }

    public function getName()
    {
        return 'search';
    }


} 