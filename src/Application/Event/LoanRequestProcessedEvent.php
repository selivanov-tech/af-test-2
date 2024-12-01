<?php

namespace App\Application\Event;

use App\Domain\Loan\Entity\Loan;
use Symfony\Contracts\EventDispatcher\Event;

class LoanRequestProcessedEvent extends Event
{
    public function __construct(
        public readonly Loan $loan,
    ) {
    }
}
