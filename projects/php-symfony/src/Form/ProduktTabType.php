<?php

namespace App\Form;

use App\Entity\ProduktTab;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProduktTabType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('typ', TextType::class,[
                'label' => 'type',
            ])
            ->add('marka',  TextType::class,[
                'label' => 'brand',
            ])
            ->add('model',  TextType::class,[
                'label' => 'model',
            ])
            ->add('cena',  TextType::class,[
                'label' => 'price',
            ])
            ->add('brzmienie', TextType::class,[
                'label' => 'sound',
            ])
            ->add('save', SubmitType::class ,[
                'label' => 'save',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ProduktTab::class,
        ]);
    }
}
