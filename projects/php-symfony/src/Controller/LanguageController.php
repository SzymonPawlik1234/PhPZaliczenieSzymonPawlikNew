<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LanguageController extends AbstractController
{
    #[Route('/change-language', name: 'change_language')]
    public function changeLanguage(Request $request): Response
    {
        $lang = $request->query->get('lang', 'pl'); 
        $request->getSession()->set('_locale', $lang);
        $referer = $request->headers->get('referer');
        return $this->redirect($referer);
    }
}