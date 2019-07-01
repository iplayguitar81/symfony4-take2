<?php
/**
 * Created by PhpStorm.
 * User: iplayguitar81
 * Date: 6/30/19
 * Time: 6:02 PM
 */

namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

use FOS\UserBundle\Form\Type\RegistrationFormType as BaseRegistrationFormType;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //add firstName field and remove username from form since username is automatically set to the email address.

        $builder
            ->add('firstName')
            ->remove('username');

    }

    //override getParent to be able to add firstName in addition to other fields existing in form...
    public function getParent()
    {
        return BaseRegistrationFormType::class;
    }


}