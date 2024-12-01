<?php

namespace App\Domain\Loan\Entity;

use App\Domain\Customer\Entity\Customer;
use App\Domain\Product\Entity\Product;
use App\Domain\Shared\Entity\Traits\SharedEntityUuidTrait;
use App\Infrastructure\Persistence\Doctrine\LoanRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LoanRepository::class)]
class Loan
{
    use SharedEntityUuidTrait;

    #[ORM\ManyToOne(targetEntity: Customer::class, inversedBy: 'loans')]
    private Customer $customer;
    #[ORM\ManyToOne(targetEntity: Product::class, inversedBy: 'products')]
    private Product $product;
    #[ORM\Column(type: 'integer', options: ['unsigned' => true])]
    private int $amount;
    #[ORM\Column(type: 'boolean')]
    private bool $result;
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $rejectReason = null;

    public function getCustomer(): Customer
    {
        return $this->customer;
    }

    public function getProduct(): Product
    {
        return $this->product;
    }

    public function getAmount(): int
    {
        return $this->amount;
    }

    public function getResult(): bool
    {
        return $this->result;
    }

    public function getRejectReason(): ?string
    {
        return $this->rejectReason;
    }

    public function setCustomer(Customer $customer): self
    {
        $this->customer = $customer;
        return $this;
    }

    public function setProduct(Product $product): self
    {
        $this->product = $product;
        return $this;
    }

    public function setAmount(int $amount): self
    {
        $this->amount = $amount;
        return $this;
    }

    public function setResult(bool $result): self
    {
        $this->result = $result;
        return $this;
    }

    public function setRejectReason(?string $rejectReason): self
    {
        $this->rejectReason = $rejectReason;
        return $this;
    }
}
