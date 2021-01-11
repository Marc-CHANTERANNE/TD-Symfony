<?php


namespace App\Controller\Forms;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends AbstractController
{

    public function loginForm(Request $request):Response{
        $form = $this->createForm(LoginFormType::class);

        $message = null;
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $data = $form->getData();

            $login = $data['login'];
            $password = $data['password'];

            return $this->redirectToRoute('hello', ['prenom'=>$data['login']]);
        } else if ($form->isSubmitted()){
            $message = 'Paramètres incorrects';
        }

        return $this->render('login.html.twig', ['form'=>$form->createView(), 'message'=>$message]);
    }

    public function loginPost(Request $request):Response{
        $form = $this->createForm(LoginFormType::class);

        //$valeur = true ? 'true' : 'false';          => if en ternaire

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $data = $form->getData();

            $login = $data['login'];
            $password = $data['password'];

            $returnMessage = "Bienvenue $login";
        }
        else{
            $returnMessage = 'Veuillez réessayer !';
        }
        return $this->render('login_result.html.twig',['message'=>$returnMessage]);
    }
}