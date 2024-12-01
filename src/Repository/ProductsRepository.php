<?php

namespace App\Repository;

use App\Model\Product;
use Psr\Log\LoggerInterface;

class ProductsRepository
{
    public LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function find($id)
    {
        $products = $this->findAll();

        foreach ($products as $product) {
            if ($product->getId() === $id) {
                return $product;
            }
        }

        return 'Product Does Not Exist .';
    }

    public function findAll(): array
    {
        $this->logger->info('Get Products Data');

        return [
            new Product(id: 1, name: "product1", price: 10, sku: "EG-192-250", qty: 10),
            new Product(id: 2, name: "product2", price: 11, sku: "EG-192-250", qty: 5),
            new Product(id: 3, name: "product3", price: 12, sku: "EG-192-250", qty: 1)
        ];
    }

}