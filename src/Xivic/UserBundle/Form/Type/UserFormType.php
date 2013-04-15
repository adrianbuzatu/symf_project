<?php

namespace Xivic\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class UserFormType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', null, array('label' => 'Username'))
            ->add('email', null, array('label' => 'Email'))
            ->add('password', 'password', array('label' => 'Parola'))
			->add('passconf', 'password', array('label' => 'Confirmare Parola'))
            ->add('role_admin',
				  'checkbox',
				  array('label' => 'Admin',
						'value' => 'ROLE_ADMIN'
				)
			)
			->add('role_user',
				  'checkbox',
				  array('label' => 'User',
						'value' => 'ROLE_USER')
			)
   
        ;
    }

    public function getName()
    {
        return 'user_form';
    }
}
