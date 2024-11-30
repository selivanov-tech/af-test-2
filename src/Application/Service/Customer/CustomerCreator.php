<?php

namespace App\Application\Service\Customer;

use App\Application\Request\Customer\CustomerCreateRequest;
use App\Domain\Customer\Entity\Customer;
use App\Domain\Customer\Factory\CustomerFactory;
use App\Domain\Customer\Repository\CustomerRepositoryInterface;

readonly class CustomerCreator
{
    public function __construct(
        private CustomerRepositoryInterface $repository,
        private CustomerFactory $factory,
    ) {
    }

    public function createCustomer(CustomerCreateRequest $createRequest): Customer
    {
        $customer = $this->factory->createFromRequest($createRequest);

        $this->repository->save($customer);

        return $customer;
    }
}
