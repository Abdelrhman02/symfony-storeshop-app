<?php

namespace App\Controller;

use App\Model\Product;
use App\Repository\ProductsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/magento/products')]
class MagentoProductsApiController extends AbstractController
{
    #[Route('', methods: ['GET'])]
    public function getProducts(ProductsRepository $productsRepository): \Symfony\Component\HttpFoundation\JsonResponse
    {
        $products = $productsRepository->findAll();

        return $this->json($products);
    }

    // <\d+> mean except only digits 1,2,3,411.
    #[Route('/get/{id<\d+>}', name: 'app_magento_products_show', methods: ['GET'])]
    public function show(int $id,ProductsRepository $productsRepository): \Symfony\Component\HttpFoundation\JsonResponse
    {
        return $this->json($productsRepository->find($id));
    }

}