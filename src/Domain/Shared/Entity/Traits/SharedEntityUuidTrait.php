<?php

namespace App\Domain\Shared\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;

trait SharedEntityUuidTrait
{
    #[ORM\Id]
    #[ORM\Column]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: 'doctrine.uuid_generator')]
    private string $id;

    public function getId(): string
    {
        return $this->id;
    }
}
