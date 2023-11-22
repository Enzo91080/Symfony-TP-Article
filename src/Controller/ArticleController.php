<?php

namespace App\Controller;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;
use App\Form\ArticleType;
use Symfony\Component\HttpFoundation\Request;

class ArticleController extends AbstractController
{
    #[Route('/', name: 'list_articles')]
    public function index(ManagerRegistry $doctrine): Response
    {

        $em = $doctrine->getManager();

        $articles = $em->getRepository(Article::class)->findAll();

        return $this->render('article/index.html.twig', [
            'articles' => $articles,
        ]);
    }

    #[Route('/edit-article/{id_article}', name: 'edit_article')]
    public function editArticle(ManagerRegistry $doctrine): Response
    {
        $em = $doctrine->getManager();

        $articles = $em->getRepository(Article::class)->findAll();

        return $this->render('article/index.html.twig', [
            'articles' => $articles,
        ]);
    }

    #[Route('/view-article/{id_article}', name: 'view_article')]
    public function viewArticle(ManagerRegistry $doctrine, $id_article): Response
    {

        $em = $doctrine->getManager();

        $article = $em->getRepository(Article::class)->find($id_article);

        return $this->render('article/viewArticle.html.twig', [
            'article' => $article,
        ]);
    }

    #[Route('/add-article/add', name: 'add_article')]
    public function addArticle(Request $request, ManagerRegistry $doctrine): Response
    {
        $em = $doctrine->getManager();
        $article = new Article();
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request); // récupération des données du formulaire 
        if($form->isSubmitted() && $form->isValid()){
            $article = $form->getData(); // récupération des données du formulaire
            $article->setBody(nl2br($article->getBody())); // remplace les retours à la ligne par des <br>
            $em->persist($article); // préparation
            $em->flush(); // enregistrement en base de données

            return $this->redirectToRoute('list_articles');
        }
        return $this->render('article/addArticle.html.twig', [
            'form' => $form->createView(),
        ]);
    }



}
