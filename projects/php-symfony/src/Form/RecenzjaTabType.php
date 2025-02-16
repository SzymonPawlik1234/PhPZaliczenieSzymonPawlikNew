<?php

namespace App\Form;

use App\Entity\RecenzjaTab;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class RecenzjaTabType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('id_produktu', null, [
                'attr' => ['style' => 'display: none;']
            ])
            ->add('ocena' ,ChoiceType::class, [
                'choices' => [
                    '1 Star' => 1,
                    '2 Stars' => 2,
                    '3 Stars' => 3,
                    '4 Stars' => 4,
                    '5 Stars' => 5,
                ],
                'expanded' => true, 
                'multiple' => false,
                'label' => 'score',
            ])

            ->add('opis_recenzji', TextareaType::class, [
                'attr' => [
                    'rows' => 7,
                    'cols' => 70, 
                ],
                'label' => 'review_description',
            ])
            ->add('user_email' ,null, [
                'attr' => ['style' => 'display: none;'],
                'label' => 'email',

            ])
            ->add('save', SubmitType::class, [
                'label' => 'save',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => RecenzjaTab::class,
        ]);
    }
}
