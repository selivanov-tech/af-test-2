<?php

namespace App\Application\Service\Customer;

use App\Application\Exception\Customer\CustomerNotFoundException;
use App\Domain\Customer\Entity\Customer;
use App\Domain\Customer\Repository\CustomerRepositoryInterface;
use Symfony\Component\Uid\UuidV7;

readonly class CustomerGetter
{
    public function __construct(
        private CustomerRepositoryInterface $repository,
    ) {
    }

    public function getCustomerById(UuidV7 $customerId): Customer
    {
        return $this->repository->findById($customerId) ?? throw new CustomerNotFoundException();
    }
}
