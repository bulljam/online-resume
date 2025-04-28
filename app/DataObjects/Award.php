<?php
namespace App\DataObjects;

use Carbon\Carbon;

readonly class Award
{
    public function __construct(
        public string $title = '',
        public string $awarder = '',
        public ?Carbon $date = null,
        public string $summary = '',
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            title: $data['title'] ?? '',
            awarder: $data['awarder'] ?? '',
            date: isset($data['date']) ? new Carbon($data['date']) : null,
            summary: $data['summary'] ?? '',
        );
    }
}
