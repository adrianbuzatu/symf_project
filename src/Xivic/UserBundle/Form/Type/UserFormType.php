<?php

namespace Xivic\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class UserFormType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', null, array('label' => 'Utilizator'))
            ->add('email', null, array('label' => 'Email'))
            ->add('password', 'repeated', array(
                'type' => 'password',
                'options' => array('translation_domain' => 'FOSUserBundle'),
                'first_options' => array('label' => 'Parola'),
                'second_options' => array('label' => 'Confirma Parola'),
                'invalid_message' => 'Parolele nu se potrivesc. Incearca din nou.',
            ))    
            ->add('role_admin',
				  'checkbox',
				  array('label' => 'Admin',
						'required'  => false,
						'value' => 'ROLE_ADMIN'
				)
			)
			->add('role_user',
				  'checkbox',
				  array('label' => 'User',
						'required'  => false,
						'value' => 'ROLE_USER')
			)
			->add('role_super_admin',
				  'checkbox',
				  array('label' => 'Batman(superadmin, mai exact)',
						'required'  => false,
						'value' => 'ROLE_SUPERADMIN')
			)
   
        ;
    }

    public function getName()
    {
        return 'user_form';
    }
}
