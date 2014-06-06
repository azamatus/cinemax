<?php
/**
 * Created by PhpStorm.
 * User: Aza
 * Date: 26.02.14
 * Time: 18:15
 */

namespace Cinemax\FeedbackBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class FeedbackType extends AbstractType{

    /**
     * @param FormBuilderInterface %builder
     * @param array $options
     */

    public function buildForm(FormBuilderInterface $builder, array $options){

        $builder
            ->add('email', 'email', array('attr'=>array('placeholder'=>'Электронный адрес')))
            ->add('message', 'textarea', array('required'=>true, 'attr'=>array('placeholder'=>'Ваше сообщение')))
            ->add('captcha', 'captcha', array('attr'=>array('placeholder'=>'Введите цифры с картинки'), 'reload'=>'#', 'as_url'=>true))
            ->add('save', 'submit', array('label'=>'Отправить сообщение'))
        ;
    }

    /**
     * @return string
     */
    public function getName(){
        return 'cinemax_feedbackbundle_feedback';
    }

} 