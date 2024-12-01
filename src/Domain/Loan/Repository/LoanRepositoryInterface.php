<?php

namespace App\Domain\Loan\Repository;

use App\Domain\Loan\Entity\Loan;

interface LoanRepositoryInterface
{
    public function findById(string $id): ?Loan;

    public function findByCustomerId(string $customerId): array;

    public function save(Loan $loan): void;

    public function remove(Loan $loan): void;
}
