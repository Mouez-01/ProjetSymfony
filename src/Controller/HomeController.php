<?php

namespace App\Controller;

use App\Entity\Carousel;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
   
        $carousels = $this->entityManager->getRepository(Carousel::class)->findAll();
   
        return $this->render('home/index.html.twig',[
         
            'carousels' => $carousels
        ]);
    }
}
