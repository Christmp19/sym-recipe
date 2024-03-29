<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\RecipeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class HomeController extends AbstractController
{
    #[Route('/', 'home.index', methods: ['GET'])]
    public function index(
        RecipeRepository $recipeRepository, 
        EntityManagerInterface $em,
        UserPasswordHasherInterface $hasher
    ): Response {

        // $user = new User();
        // $user->setFullName('Christ MPASSI')
        //     ->setPseudo('christ_mp')
        //     ->setEmail('admin@gmail.com')
        //     ->setRoles(['ROLE_ADMIN'])
        //     ->setPassword($hasher->hashPassword($user, 'Emiliodave'));
        //     $em->persist($user);
        //     $em->flush();

        return $this->render('pages/home.html.twig', [
            'recipes' => $recipeRepository->findPublicRecipe(3)
        ]);
    }
}
