<?php

namespace App\Application\Exception\Customer;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class CustomerNotFoundException extends NotFoundHttpException
{
    public function __construct(string $message = '', ?Throwable $previous = null, int $code = 0, array $headers = [])
    {
        if (empty($message)) {
            $message = 'Customer not found';
        }

        parent::__construct($message);
    }
}
