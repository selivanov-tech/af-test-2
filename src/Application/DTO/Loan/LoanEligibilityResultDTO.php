<?php

namespace App\Application\DTO\Loan;

use App\Domain\Loan\Exception\LoanApplicationDeniedException;

class LoanEligibilityResultDTO
{
    public function __construct(
        public readonly bool $success,
        public readonly ?LoanApplicationDeniedException $exception = null,
    ) {
    }
}
