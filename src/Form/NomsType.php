<?php

namespace App\Form;

use App\Entity\Noms;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class NomsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('designation',TextType::class,[
                'label'=> 'Nom de Famille',
                'attr'=>[
                    'placeholder'=> 'Entrez un nom de famille',
                ],
                'required'=>true,
                'error_bubbling'=>false,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('n')
                        ->orderBy('n.designation', 'ASC');
                },
            ])
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
            'data_class' => Noms::class,
        ]);
    }
}
