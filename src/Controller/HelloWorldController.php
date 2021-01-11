<?php


namespace App\Controller;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HelloWorldController extends \Symfony\Bundle\FrameworkBundle\Controller\AbstractController
{
    /**
     * Controller "hello world", affiche la chaîne "Hello World" dans le navigateur
     * @param string $prenom le prénom à afficher
     * @return Response
     */
    function hello($prenom):Response{
        return $this->render('hello.html.twig', [
            'prenom'=>$prenom
        ]);
    }

    /**
     * Affiche un formulaire
     * @return Response
     */
    function form():Response{

        return new Response("<html>
    <body>
        <form method='post'>
            Nom : <input name='name'/>
            <input type='submit'/>
        </form>
    </body>
</html>");

    }

    /**
     * @param Request $request
     * @return Response
     */
    function formReceive(Request $request):Response{
        $formData = $request->request->get('name');
        return new Response("Merci $formData");
    }

    function liste():Response{
        $liste = ['Bernard', 'Jean', 'Daniel', 'Patrick'];
        return $this->render('liste.html.twig', [
            'liste'=>$liste
        ]);
    }
}