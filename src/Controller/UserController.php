<?php


namespace App\Controller;

use App\Entity\Role;
use App\Entity\User;
use App\Repository\UserRepository;
use App\Repository\RoleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController
{
    /**
     * @Route ("/createUser", name="createUser")
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function createUser(EntityManagerInterface $entityManager):Response {
        $user = new User();
        $user->setLogin('JP4');
        $user->setPassword('jp4psswd');
        $user->setFirstname('Jean-Pierre');
        $user->setLastname('Rammus');
        $entityManager->persist($user);
        $entityManager->flush();
        return new Response('Saved new user with id'.$user->getId());
    }

    /**
     * @Route ("/createRole", name="createRole")
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function createRole(EntityManagerInterface $entityManager):Response {
        $role = new Role();
        $role->setName('tester');
        $role->setCode('3');
        $entityManager->persist($role);
        $entityManager->flush();
        return new Response('Saved new role with id'.$role->getId());
    }

    /**
     * @Route ("/attributeRole/{id}", name="attributeRole")
     * @param EntityManagerInterface $entityManager
     * @param RoleRepository $roleRepository
     * @return Response
     */
    public function attributeRole(EntityManagerInterface $entityManager, RoleRepository $roleRepository, int $id):Response{
        $role = $roleRepository->find(1);
        $user = new User();
        $user->setId(1);
        $user->setRole($role);
        $entityManager->persist($user);
        $entityManager->flush();
        return new Response('Saved new role for the user '.$user->getId());
    }
}