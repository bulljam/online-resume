<?php
namespace App\DataObjects;

use Carbon\Carbon;

readonly class Certification
{
    public function __construct(
        public string $name = '',
        public string $issuer = '',
        public ?Carbon $date = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            name: $data['name'] ?? '',
            issuer: $data['issuer'] ?? '',
            date: isset($data['date']) ? new Carbon($data['date']) : null,
        );
    }
}
