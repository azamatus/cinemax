<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Nurlan
 * Date: 04.05.13
 * Time: 20:04
 * To change this template use File | Settings | File Templates.
 */

namespace Application\Sonata\UserBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;

class RegistrationFormType extends BaseType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        // add your custom field
        $builder->add('firstname');
        $builder->add('lastname');
        $builder->add('phone');
        $builder ->add('captcha', 'captcha', array('attr'=>array('placeholder'=>'Введите цифры с картинки'), 'reload'=>'#', 'as_url'=>true));
        $builder->add('address', null,array('required'=>true));
    }

    public function getName()
    {
        return 'sonata_user_registration';
    }
}