<?php
/**
 * Created by PhpStorm.
 * User: Aza
 * Date: 11.06.14
 * Time: 13:44
 */

namespace Cinemax\VideosBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SearchMoviesType extends  AbstractType{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('search', null,array('attr'=>array('placeholder'=>"Поиск фильмов...")));
    }

    public function getName()
    {
        return 'search';
    }
} 