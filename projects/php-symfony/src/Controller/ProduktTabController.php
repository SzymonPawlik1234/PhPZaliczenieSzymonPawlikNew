<?php
namespace App\Controller;

use App\Entity\ProduktTab;
use App\Entity\RecenzjaTab;
use App\Repository\ProduktTabRepository;
use App\Repository\RecenzjaTabRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ProduktTabType;
use App\Form\RecenzjaTabType;
use Doctrine\ORM\EntityManagerInterface;






class ProduktTabController extends AbstractController
{
   
    
    #[Route('/products/add', name: 'products_add')]
    public function add(Request $request, EntityManagerInterface $manager): Response
    {
        $product = new ProduktTab;

        $form = $this->createForm(ProduktTabType::class , $product);

        $form->handleRequest($request);

        if ($form -> isSubmitted()) {

            $manager->persist($product);

            $manager->flush();

            $this -> addFlash(
                'notice',
                'Produkt został dodany'
            );

            return $this->redirectToRoute('show_product', [
                'id' => $product->getId(),
            ]);
        }


        return $this->render('product/add.html.twig', [
            'form' => $form,
        ]);

    }

    #[Route('/product/{id<\d+>}/edit', name: 'product_edit')]
    public function edit(ProduktTab $product , Request $request , EntityManagerInterface $manager)
    {
        $form = $this->createForm(ProduktTabType::class , $product);

        $form->handleRequest($request);

        if ($form -> isSubmitted()) {

            $manager->flush();

            $this -> addFlash(
                'notice',
                'Produkt został edytowany'
            );

            return $this->redirectToRoute('show_product', [
                'id' => $product->getId(),
            ]);
        }


        return $this->render('product/edit.html.twig', [
            'form' => $form,
        ]);


    }

    #[Route('/product/{id<\d+>}/delete', name: 'product_delete')]
    public function delete(ProduktTab $product , Request $request , EntityManagerInterface $manager): Response
    {
        if($request -> isMethod('POST')) {

            $manager -> remove($product);

            $manager -> flush();

            return $this -> redirectToRoute('products');
        }
        return $this->render('product/delete.html.twig', [
            'id' => $product->getId(),
        ]);


    }

    #[Route('/product/{id<\d+>}/deleteReview/{idRev<\d+>}', name: 'review_delete')]
    public function deleteReview(int $id, int $idRev, Request $request, EntityManagerInterface $manager, RecenzjaTabRepository $reviewRepo, ProduktTabRepository $productRepo): Response
    {
        $review = $reviewRepo->find($idRev);
        $product = $productRepo->find($id);
    
        if ($request->isMethod('POST')) {
            $manager->remove($review);
            $manager->flush();
            return $this->redirectToRoute('show_product', ['id' => $id]);
        }
    
        return $this->render('product/deleteReview.html.twig', [
            'idRev' => $idRev,
            'id' => $id,
        ]);
    }
    





      
    #[Route('/products', name: 'products')]
    public function Products(ProduktTabRepository $products): Response
    {


        return $this->render(('product/showProducts.html.twig'), [
            'products' => $products->findAll(),
        ]);
    }

    

    #[Route('/product/{id<\d+>}', name: 'show_product')]
    public function showProduct($id, ProduktTabRepository $repository,Request $request, EntityManagerInterface $manager, RecenzjaTabRepository $reviews): Response
    {
        $product = $repository->findOneBy(['id' => $id]);

        //$userName = $authenticationUtils
    
        if (!$product) {
            throw $this->createNotFoundException('product no found');
        }

        $user = $this->getUser();

       
        if ($user) {
            $email = $user->getEmail(); 
        } 
        else {
            $email = 'Guest)';
        }

        $review = new RecenzjaTab;
        $review->setIdProduktu($product->getId());
        $review->setUserEmail($email);

        $form = $this->createForm(RecenzjaTabType::class , $review);

        $form->handleRequest($request);

        if ($form -> isSubmitted()) {

            $manager->persist($review);

            $manager->flush();

        }

    
        return $this->render('product/showProdukt.html.twig', [
            'product' => $product,
            'form' => $form,
            'reviews' => $reviews->findAll(),

        ]);

        
    }

 



    // #[Route('/produkt/{id<\d+>}', name: 'show_produkt')]
    // public function showProdukt($id, ProduktTabRepository $repository): Response
    // {
    //     $produkt = $repository->findOneBy(['id' => $id]);
    
    //     if (!$produkt) {
    //         throw $this->createNotFoundException('Produkt o podanym ID nie istnieje.');
    //     }
    
    //     return $this->render('produkt/showProdukt.html.twig', [
    //         'produkt' => $produkt
    //     ]);
    // }
    

    



}