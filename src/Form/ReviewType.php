<?php

namespace App\Form;

use App\Entity\Review;
use App\Entity\Product;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bridge\Doctrine\Form\Type\HiddenType;

class ReviewType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('description')
            ->add('rating')
            ->add('username',\Symfony\Component\Form\Extension\Core\Type\HiddenType::class)
            ->add('pricePaid')
            ->add('placePurchased')
            ->add('product', EntityType::class, [
                // list objects from this class
                'class' => 'App:Product',
                // use the 'Category.' property as the visible option string
                'choice_label' => 'title',
            ])

           ;


    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Review::class,
        ]);
    }
}
