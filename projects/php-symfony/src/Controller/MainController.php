<?php
// src/Controller/LuckyController.php
namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class MainController extends AbstractController
{
  
 
    #[Route('/', name: 'menu')]
    public function menu(): Response
    {
        return $this->render('mainMenu.html.twig', [
        ]);
    }

    
    
}
