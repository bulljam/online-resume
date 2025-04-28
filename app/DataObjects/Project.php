<?php
namespace App\DataObjects;

use Carbon\Carbon;

readonly class Project
{
    public function __construct(
        public string $name = '',
        public string $description = '',
        public string $url = '',
        public ?Carbon $startDate = null,
        public ?Carbon $endDate = null,
        public array $highlights = [],
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            name: $data['name'] ?? '',
            description: $data['description'] ?? '',
            url: $data['url'] ?? '',
            startDate: isset($data['startDate']) ? new Carbon($data['startDate']) : null,
            endDate: isset($data['endDate']) ? new Carbon($data['endDate']) : null,
            highlights: $data['highlights'] ?? [],
        );
    }
}
