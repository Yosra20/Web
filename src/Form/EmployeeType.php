<?php

namespace App\Form;

use App\Entity\Employee;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EmployeeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->setAttributes([
                'novalidate' => 'novalidate'
            ])
            ->add('Nom', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Donner votre nom'
                ],
            ])
            ->add('Prenom', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Donner votre prenom'
                ],
            ])
            ->add('Type', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Donner votre type'
                ],
            ])
            ->add('Email', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Donner votre email'
                ],
            ])
            ->add('Disponibilite', ChoiceType::class, [
                'choices' => [
                    'disponible' => true,
                    'indisponible' => false,
                ],
                'expanded' => true,
                'multiple' => false,
                'label' => 'Disponibilité',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Employee::class,
        ]);
    }
}
