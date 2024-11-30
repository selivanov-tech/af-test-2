<?php

namespace App\Application\Request\Customer;

use App\Domain\Customer\ValueObject\Address;
use Symfony\Component\Validator\Constraints as Assert;

abstract class AbstractBaseCustomerRequest
{
    #[Assert\Email]
    #[Assert\NotBlank(groups: ['create'])]
    public readonly ?string $email;

    #[Assert\Length(min: 10, max: 10)]
    #[Assert\NotBlank(groups: ['create'])]
    public readonly ?string $phone;

    #[Assert\Date]
    #[Assert\NotBlank(groups: ['create'])]
    public readonly ?string $birthday;

    #[Assert\Length(min: 1, max: 255)]
    #[Assert\NotBlank(groups: ['create'])]
    public readonly ?string $firstName;

    #[Assert\Length(min: 1, max: 255)]
    #[Assert\NotBlank(groups: ['create'])]
    public readonly ?string $lastName;

    #[Assert\Regex(
        pattern: '/^\d{3}-\d{2}-\d{4}$/',
        message: 'The SSN must be in the format XXX-XX-XXXX',
    )]
    #[Assert\NotBlank(groups: ['create'])]
    public readonly ?string $ssn;

    #[Assert\Range(
        notInRangeMessage: 'FICO score must be between {{ min }} and {{ max }}.',
        min: 300,
        max: 850,
    )]
    #[Assert\NotBlank(groups: ['create'])]
    public readonly ?int $ficoScore;

    #[Assert\Type(type: Address::class, message: 'Invalid Address object.')]
    #[Assert\NotBlank(groups: ['create'])]
    public readonly ?Address $address;

    public function __construct(array $data)
    {
        $this->email = $data['email'] ?? null;
        $this->phone = $data['phone'] ?? null;
        $this->birthday = $data['birthday'] ?? null;
        $this->firstName = $data['firstName'] ?? null;
        $this->lastName = $data['lastName'] ?? null;
        $this->ssn = $data['ssn'] ?? null;
        $this->ficoScore = $data['ficoScore'] ?? null;
        $this->address = $data['address'] ? Address::fromRequestData($data['address']) : null;
    }
}
