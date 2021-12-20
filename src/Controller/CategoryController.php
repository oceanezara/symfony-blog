<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    #[Route('/category/{name}', methods:['GET'], requirements:['name' => '[a-z]+'], name: 'category')]
    public function index(string $name, CategoryRepository $categoryRepository): Response
    {
        return $this->render('category/index.html.twig', [
            'name' => $name,
        ]);
    }
}
