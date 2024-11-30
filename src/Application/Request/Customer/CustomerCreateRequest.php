<?php

namespace App\Application\Request\Customer;

use Symfony\Component\Validator\Constraints\GroupSequence;

#[GroupSequence(['CustomerCreateRequest'])]
final class CustomerCreateRequest extends AbstractBaseCustomerRequest
{
}
