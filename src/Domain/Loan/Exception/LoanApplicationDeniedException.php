<?php

namespace App\Domain\Loan\Exception;

use App\Domain\Exception\AbstractDomainException;

class LoanApplicationDeniedException extends AbstractDomainException
{
    public function __construct(
        protected string $reason,
        protected bool $public = true,
    ) {
        parent::__construct('Loan application denied');
    }

    public function getPublicReason(): string
    {
        return $this->public ? $this->reason : '';
    }

    public function getReason(): string
    {
        // todo: check that user has management access, in the application layer
        return $this->reason;
    }
}
