<?php

namespace App\Infrastructure\Util\Date;

use DateTimeImmutable;

class DateParser
{
    private string $format;

    public function __construct(string $format)
    {
        $this->format = $format;
    }

    public function parseImmutable(string $date): DateTimeImmutable
    {
        $parsedDate = DateTimeImmutable::createFromFormat($this->format, $date);
        if ($parsedDate === false) {
            throw new \InvalidArgumentException('Invalid date format.');
        }

        return $parsedDate;
    }
}
