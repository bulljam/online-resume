<?php

namespace App\DataObjects;

readonly class Skill
{
    public function __construct(
        public string $name = '',
        public ?SkillLevel $level = null,
        public array $keywords = [],
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            name: $data['name'] ?? '',
            level: SkillLevel::fromSting($data['level']) ?? null,
            keywords: $data['keywords'] ?? [],
        );
    }
}
