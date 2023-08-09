<?php

namespace App\Form;

use App\Entity\LoginAdmin;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LoginAdminType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('user')
            ->add('username')
            ->add('passwordId')
            ->add('plainpassword')
            ->add('password')
            ->add('nivelUser')
            ->add('roles')
            ->add('responsable')
            ->add('lang')
            ->add('telefono')
            ->add('ultimoacceso')
            ->add('myip')
            ->add('esResponsable')
            ->add('activo')
            ->add('impersonateToken')
            ->add('impersonateTs')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => LoginAdmin::class,
        ]);
    }
}
