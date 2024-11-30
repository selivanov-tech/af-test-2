<?php

namespace App\Infrastructure\Persistence\Doctrine\Abstract;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

abstract class AbstractDoctrineRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, $this->getEntityClass());
    }

    abstract protected function getEntityClass(): string;
}
