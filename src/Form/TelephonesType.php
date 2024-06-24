<?php

namespace App\Form;

use App\Entity\Meres;
use App\Entity\Peres;
use App\Entity\Telephones;
use App\Entity\Users;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TelephonesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('numero')
            ->add('createdAt', null, [
                'widget' => 'single_text'
            ])
            ->add('updatedAt', null, [
                'widget' => 'single_text'
            ])
            ->add('slug')
            ->add('mere1', EntityType::class, [
                'class' => Meres::class,
'choice_label' => 'id',
            ])
            ->add('mere2', EntityType::class, [
                'class' => Meres::class,
'choice_label' => 'id',
            ])
            ->add('pere1', EntityType::class, [
                'class' => Peres::class,
'choice_label' => 'id',
            ])
            ->add('pere2', EntityType::class, [
                'class' => Peres::class,
'choice_label' => 'id',
            ])
            ->add('createdBy', EntityType::class, [
                'class' => Users::class,
'choice_label' => 'id',
            ])
            ->add('updatedBy', EntityType::class, [
                'class' => Users::class,
'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Telephones::class,
        ]);
    }
}
