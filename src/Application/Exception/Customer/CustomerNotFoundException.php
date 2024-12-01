<?php

namespace App\Application\Exception\Customer;

use App\Application\Exception\Abstract\AbstractNotFoundException;

class CustomerNotFoundException extends AbstractNotFoundException
{
    protected function getEntityName(): string
    {
        return 'Customer';
    }
}
