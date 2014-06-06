<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Aza
 * Date: 13.09.13
 * Time: 15:58
 * To change this template use File | Settings | File Templates.
 */
namespace Cinemax\CinemaxBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;



class BinClientsFormType extends  AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('fio', 'text', array('label'=> 'ФИО:', 'required'=>true));
        $builder->add('phone','text', array('label'=>'Номер телефона:', 'required'=>true));
        $builder->add('email','email',array('label'=>'email:','required'=>true));
        $builder->add('address','text',array('label'=>'Адрес доставки:', 'required'=>true));

    }

    public function getName()
    {
        return 'bin_clients';
    }
}