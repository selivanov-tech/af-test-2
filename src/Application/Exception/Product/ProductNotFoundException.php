<?php

namespace App\Application\Exception\Product;

use App\Application\Exception\Abstract\AbstractNotFoundException;

class ProductNotFoundException extends AbstractNotFoundException
{
    protected function getEntityName(): string
    {
        return 'Product';
    }
}
