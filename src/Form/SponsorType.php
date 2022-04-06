<?php

namespace App\Form;

use App\Entity\Sponsor;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SponsorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('sponsor', null, [
                'label' => 'Sponsor'
            ])
            ->add('firstName', null, [
                'label' => 'Prénom'
            ])
            ->add('lastName', null, [
                'label' => 'Nom'
            ])
            ->add('email', null, [
                'label' => 'Adresse email'
            ])
            ->add('postalCode', null, [
                'label' => 'Code postal'
            ])
            ->add('country', CountryType::class, [
                'label' => 'Pays'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Sponsor::class,
        ]);
    }
}
