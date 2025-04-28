<?php
namespace App\DataObjects;

readonly class Resume
{
    public function __construct(
        public Basic $basics,
        public array $work = [],
        public array $education = [],
    ) {
    }

    public static function fromArray(array $data): self
    {
        $basics = Basic::fromArray($data['basics'] ?? []);
        $work = array_map(fn($w) => Work::fromArray($w), $data['work'] ?? []);
        $education = array_map(fn($e) => Education::fromArray($e), $data['education'] ?? []);

        return new self(
            basics: $basics,
            work: $work,
            education: $education,
        );
    }
}