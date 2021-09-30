<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Image;
use Symfony\Component\Validator\Constraints\NotBlank;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $user = $builder->getData();
        
        $builder
            ->add('firstname', TextType::class, [
                'label' => 'Prénom',
                'constraints' => new NotBlank(),
                'required' => true,
                'trim' => true
            ])
            ->add('lastname', TextType::class, [
                'label' => 'Nom',
                'constraints' => new NotBlank(),
                'required' => true,
                'trim' => true
            ])
            ->add('email', EmailType::class, [
                'constraints' => new NotBlank(),
                'required' => true,
                'trim' => true,
            ])
            ->add('password', PasswordType::class, [
                'label' => 'Mot de passe',
                'constraints' => new NotBlank(),
            ])
            ->add('confirmedPassword', PasswordType::class, [
                'label' => 'Confirmation du mot de passe',
                'mapped' => false,
                'required' => true
            ])
            /*->add('pictureFile', FileType::class, [
                'label' => $user->getPicture() ? 'Photo de profil' : '*Photo de profil',
                'mapped' => false,
                'required' => !$user->getPicture(),
                'constraints' => [
                    new Image(
                        [
                            'mimeTypesMessage' => 'Veuillez soumettre une image',
                            'maxSize' => '1M',
                            'maxSizeMessage' => 'Votre image fait {{ size }} {{ suffix }}. La limite est de {{ limit }} {{ suffix }}.'
                        ]
                    )
                ]
            ])*/
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
