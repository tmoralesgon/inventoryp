<?php
namespace App\Form\Type;

use App\Entity\InvInventory;
use App\Entity\InvType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InvInventoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class)
            ->add('description', TextType::class)
            ->add('type', EntityType::class, [
                'class' => InvType::class,
                'choice_label' => 'name',
                // used to render a select box, check boxes or radios
                'multiple' => false,
                'expanded' => false,
            ])
            ->add('save', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => InvInventory::class,
        ]);
    }
}