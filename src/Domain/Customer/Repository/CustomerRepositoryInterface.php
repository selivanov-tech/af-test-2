<?php

namespace App\Domain\Customer\Repository;

use App\Domain\Customer\Entity\Customer;

interface CustomerRepositoryInterface
{
    public function findById(string $id): ?Customer;

    public function findByEmail(string $email): ?Customer;

    public function save(Customer $customer): void;

    public function remove(Customer $customer): void;
}
