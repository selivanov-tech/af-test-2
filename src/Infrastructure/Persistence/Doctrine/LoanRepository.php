<?php

namespace App\Infrastructure\Persistence\Doctrine;

use App\Domain\Loan\Entity\Loan;
use App\Domain\Loan\Repository\LoanRepositoryInterface;
use App\Infrastructure\Persistence\Doctrine\Abstract\AbstractDoctrineRepository;

class LoanRepository extends AbstractDoctrineRepository implements LoanRepositoryInterface
{
    protected function getEntityClass(): string
    {
        return Loan::class;
    }

    public function findById(string $id): ?Loan
    {
        return $this->find($id);
    }

    public function findByCustomerId(string $customerId): array
    {
        return $this->findBy(['customerId' => $customerId]);
    }

    public function save(Loan $loan): void
    {
        $this->getEntityManager()->persist($loan);
        $this->getEntityManager()->flush();
    }

    public function remove(Loan $loan): void
    {
        $this->getEntityManager()->remove($loan);
        $this->getEntityManager()->flush();
    }
}
