<?php

namespace Xivic\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ContactFormType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nume', null, array('label' => 'Nume'))
            ->add('prenume', null, array('label' => 'Prenume'))
            ->add('telefon', null, array('label' => 'Telefon'))
            ->add('adresa', null, array('label' => 'Adresa'))
   
        ;
    }

    public function getName()
    {
        return 'contact';
    }
}
