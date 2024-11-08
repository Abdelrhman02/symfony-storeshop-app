<?php

namespace App\Controller;

use App\Model\Product;
use App\Repository\ProductsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

class MagentoProductsApi extends AbstractController
{
    #[Route('/api/magento/get/products')]
    public function getProducts(ProductsRepository $productsRepository): \Symfony\Component\HttpFoundation\JsonResponse
    {
        $products = $productsRepository->findAll();

        return $this->json($products);
    }

}