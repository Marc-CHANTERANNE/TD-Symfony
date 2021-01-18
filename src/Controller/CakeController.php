<?php

namespace App\Controller;

use App\Entity\Cake;
use App\Repository\CakeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CakeController extends AbstractController
{
    /**
     * @Route ("/createCake", name="createCake")
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function createCake(EntityManagerInterface $entityManager): Response
    {
        $cake = new Cake();
        $cake->setName('Cake aux olives');
        $cake->setIsSweet('No');
        $entityManager->persist($cake);
        $entityManager->flush();
        return new Response('Saved new cake with id'.$cake->getId());
    }

    /**
     * @Route ("/getIdCake/{id}", name="getIdCake")
     * @param int $id
     * @param CakeRepository $cakeRepository
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function getById(int $id, CakeRepository $cakeRepository):Response{
        $cake = $cakeRepository->find($id);
        return new Response('The name of the cake is '.$cake->getName());
    }
}
