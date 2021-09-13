<?php

namespace App\Form;

use App\Entity\Matchplayer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MatchplayerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('games_played', IntegerType::class, [
                'label' => 'Nombre de matchs',
            ])
            ->add('min_played', IntegerType::class, [
                'label' => 'Nombre de minutes',
            ])
            ->add('goals', IntegerType::class, [
                'label' => 'Buts',
            ])
            ->add('assists', IntegerType::class, [
                'label' => 'Passes décisives',
            ])
            ->add('year', null, [
                'label' => 'Année',
            ])
            ->add('team_id')
            ->add('player')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Matchplayer::class,
        ]);
    }
}
