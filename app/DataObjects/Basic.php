<?php
namespace App\DataObjects;

readonly class Basic
{
    public function __construct(
        public string $name = '',
        public string $label = '',
        public string $image = '',
        public string $email = '',
        public string $phone = '',
        public string $url = '',
        public string $summary = '',
        public ?Location $location = null,
        public array $profiles = [],
    ) {
    }

    public static function fromArray(array $data): self
    {
        $location = Location::fromArray($data['location'] ?? []);
        $profiles = array_map(fn($p) => SocialProfile::fromArray($p), $data['profiles'] ?? []);

        return new self(
            name: $data['name'] ?? '',
            label: $data['label'] ?? '',
            image: $data['image'] ?? '',
            email: $data['email'] ?? '',
            phone: $data['phone'] ?? '',
            url: $data['url'] ?? '',
            summary: $data['summary'] ?? '',
            location: $location,
            profiles: $profiles,
        );
    }
}