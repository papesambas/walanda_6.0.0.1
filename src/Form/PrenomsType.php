<?php

namespace App\Form;

use App\Entity\Prenoms;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class PrenomsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('designation',TextType::class,[
                'label'=> 'Prénom',
                'attr'=>[
                    'placeholder'=> 'Entrez le Prénom',
                ],
                'required'=>true,
                'error_bubbling'=>false,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('p')
                        ->orderBy('p.designation', 'ASC');
                },            ])
            //->add('slug')
            //->add('createdAt', null, [
            //    'widget' => 'single_text'
            //])
            //->add('updatedAt', null, [
            //    'widget' => 'single_text'
            //])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Prenoms::class,
        ]);
    }
}
