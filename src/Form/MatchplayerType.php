<?php

namespace App\Form;

use App\Entity\Matchplayer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MatchplayerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('games_played')
            ->add('min_played')
            ->add('goals')
            ->add('assists')
            ->add('year')
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
