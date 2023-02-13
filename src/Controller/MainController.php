<?php

namespace App\Controller;

use App\Entity\Character;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="app_main")
     */
    public function index(EntityManagerInterface $entityManager): Response
    {
        $characters = $entityManager
            ->getRepository(Character::class)
            ->findAll();

        return $this->render('main/index.html.twig', [
            'characters' => $characters,
        ]);
    }
}
