<?php

namespace App\Application\Request\Customer;

use Symfony\Component\Validator\Constraints\GroupSequence;

#[GroupSequence(['CustomerUpdateRequest'])]
final class CustomerUpdateRequest extends AbstractBaseCustomerRequest
{
}
