<?php
/**
 * Created by PhpStorm.
 * User: iplayguitar81
 * Date: 6/30/19
 * Time: 6:38 PM
 */

namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

use FOS\UserBundle\Form\Type\ProfileFormType as BaseRegistrationFormType;


class ProfileFormType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //remove username from form since username is automatically set to the email address.

        $builder
            ->add('firstName')
            ->remove('username');

    }

    //override getParent to be able to remove username from Edit profile page...
    public function getParent()
    {
        return BaseRegistrationFormType::class;
    }


}