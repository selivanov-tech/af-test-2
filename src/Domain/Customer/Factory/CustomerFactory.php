<?php

namespace App\Domain\Customer\Factory;

use App\Application\Request\Customer\CustomerCreateRequest;
use App\Application\Request\Customer\CustomerUpdateRequest;
use App\Domain\Customer\Entity\Customer;
use App\Infrastructure\Util\Date\DateParser;
use DateTimeImmutable;

class CustomerFactory
{
    public function __construct(
        protected readonly DateParser $dateParser,
    ) {
    }

    public function createFromRequest(CustomerCreateRequest $request): Customer
    {
        return (new Customer())
            ->setEmail($request->email)
            ->setPhone($request->phone)
            ->setBirthday($this->dateParser->parseImmutable($request->birthday))
            ->setFirstName($request->firstName)
            ->setLastName($request->lastName)
            ->setSsn($request->ssn)
            ->setFicoScore($request->ficoScore)
            ->setAddress($request->address->toArray());
    }

    public function updateFromRequest(Customer $customer, CustomerUpdateRequest $request): void
    {
        if ($request->email !== null) {
            $customer->setEmail($request->email);
        }

        if ($request->phone !== null) {
            $customer->setPhone($request->phone);
        }

        if ($request->firstName !== null) {
            $customer->setFirstName($request->firstName);
        }

        if ($request->lastName !== null) {
            $customer->setLastName($request->lastName);
        }

        if ($request->ssn !== null) {
            $customer->setSsn($request->ssn);
        }

        if ($request->ficoScore !== null) {
            $customer->setFicoScore($request->ficoScore);
        }

        if ($request->birthday !== null) {
            $customer->setBirthday(new DateTimeImmutable($request->birthday));
        }

        if ($request->address !== null) {
            $customer->setAddress($request->address->toArray());
        }
    }
}
