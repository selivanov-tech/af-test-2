<?php

namespace App\Infrastructure\Persistence\Doctrine;

use App\Domain\Customer\Entity\Customer;
use App\Domain\Customer\Repository\CustomerRepositoryInterface;
use App\Infrastructure\Persistence\Doctrine\Abstract\AbstractDoctrineRepository;

class CustomerRepository extends AbstractDoctrineRepository implements CustomerRepositoryInterface
{
    protected function getEntityClass(): string
    {
        return Customer::class;
    }

    public function findById(string $id): ?Customer
    {
        return $this->find($id);
    }

    public function findByEmail(string $email): ?Customer
    {
        return $this->findOneBy(['email' => $email]);
    }

    public function save(Customer $customer): void
    {
        $this->getEntityManager()->persist($customer);
        $this->getEntityManager()->flush();
    }

    public function remove(Customer $customer): void
    {
        $this->getEntityManager()->remove($customer);
        $this->getEntityManager()->flush();
    }
}
