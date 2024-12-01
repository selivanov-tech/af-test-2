<?php

namespace App\Domain\Product\Repository;

use App\Domain\Product\Entity\Product;

interface ProductRepositoryInterface
{
    public function findById(string $id): ?Product;

    public function save(Product $customer): void;

    public function remove(Product $customer): void;
}
