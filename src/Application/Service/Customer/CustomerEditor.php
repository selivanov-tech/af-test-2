<?php

namespace App\Application\Service\Customer;

use App\Application\Exception\Customer\CustomerNotFoundException;
use App\Application\Request\Customer\CustomerUpdateRequest;
use App\Domain\Customer\Entity\Customer;
use App\Domain\Customer\Factory\CustomerFactory;
use App\Domain\Customer\Repository\CustomerRepositoryInterface;
use Symfony\Component\Uid\UuidV7;

class CustomerEditor
{
    public function __construct(
        private CustomerRepositoryInterface $repository,
        private CustomerFactory $factory,
    ) {
    }

    public function editCustomer(UuidV7 $id, CustomerUpdateRequest $updateRequest): Customer
    {
        $customer = $this->repository->findById($id) ?? throw new CustomerNotFoundException();

        $this->factory->updateFromRequest($customer, $updateRequest);

        $this->repository->save($customer);

        return $customer;
    }
}
