<?php
/**
 * Created by PhpStorm.
 * User: wilder14
 * Date: 26/11/17
 * Time: 12:17
 */

namespace WCS\CoavBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName')
            ->add('lastName')
            ->add('phoneNumber')
            ->add('birthDate')
//            ->add('creationDate')
            ->add('isACertifiedPilot')
            ->add('isActive');
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }

    public function getName()
    {
        return $this->getBlockPrefix();
    }
}