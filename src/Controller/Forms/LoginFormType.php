<?php


namespace App\Controller\Forms;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class LoginFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //On ajoute les champs du formulaire avec un nom et type pour chaque
        $builder->add('login', TextType::class,[
            'constraints' => new NotBlank()
        ]);
        $builder->add('password', PasswordType::class, [
            'constraints' => new Length(null, 3, 10),
        ]);
        $builder->add('submit', SubmitType::class);
    }
}