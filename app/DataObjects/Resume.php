<?php
namespace App\DataObjects;
readonly class Resume
{
    public function __construct(
        public Basic $basics,
        public array $work = [],
        public array $education = [],
        public array $skills = [],
        public array $projects = [],
        public array $certifications = [],
        public array $languages = [],
        public array $awards = [],
        public array $interests = [],
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            basics: Basic::fromArray($data['basics'] ?? []),
            work: array_map(fn($w) => Work::fromArray($w), $data['work'] ?? []),
            education: array_map(fn($e) => Education::fromArray($e), $data['education'] ?? []),
            skills: array_map(fn($s) => Skill::fromArray($s), $data['skills'] ?? []),
            projects: array_map(fn($p) => Project::fromArray($p), $data['projects'] ?? []),
            certifications: array_map(fn($c) => Certification::fromArray($c), $data['certifications'] ?? []),
            languages: array_map(fn($l) => Language::fromArray($l), $data['languages'] ?? []),
            awards: array_map(fn($a) => Award::fromArray($a), $data['awards'] ?? []),
            interests: array_map(fn($i) => Interest::fromArray($i), $data['interests'] ?? []),
        );
    }
}
