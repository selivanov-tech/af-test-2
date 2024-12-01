<?php

namespace App\Domain\Product\ValueObject;

use App\Domain\Product\Entity\Product;
use App\Domain\Product\Enum\StateScoreMultiplierOperationEnum;
use InvalidArgumentException;

class StateScoreMultiplier
{
    public readonly string $state;
    public readonly StateScoreMultiplierOperationEnum $operation;
    public readonly int|float $value;

    public function __construct(array $ruls)
    {
        if (!isset($rule['state'], $rule['operation'], $rule['value'])) {
            throw new InvalidArgumentException('Each rule must have "state", "operation", and "value".');
        }

        $operation = StateScoreMultiplierOperationEnum::tryFrom($rule['operation']);
        if ($operation === null) {
            throw new InvalidArgumentException('Invalid operation. Allowed: "plus", "minus".');
        }

        if (!is_numeric($rule['value'])) {
            throw new InvalidArgumentException('Value must be numeric.');
        }

        $this->state = $rule['state'];
        $this->operation = $operation;
        $this->value = $rule['value'];
    }

    public function toArray(): array
    {
        return [
            'state' => $this->state,
            'operation' => $this->operation,
            'value' => $this->value,
        ];
    }

    public function applyRule(Product $product): void
    {
        $interestRate = $product->getInterestRate();

        $newRate = match ($this->operation) {
            StateScoreMultiplierOperationEnum::PLUS => $interestRate + $this->value,
            StateScoreMultiplierOperationEnum::MINUS => $interestRate - $this->value,
            //StateScoreMultiplierOperationEnum::MULTIPLY => $getInterestRate * (1 + $this->value / 100),
            //StateScoreMultiplierOperationEnum::DIVIDE => $getInterestRate * (1 - $this->value / 100),
        };

        $product->setInterestRate($newRate);
    }
}
