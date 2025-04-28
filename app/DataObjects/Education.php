<?php

namespace App\DataObjects;

use Carbon\Carbon;

readonly class Education
{
    public function __construct(
        public string $institution = '',
        public string $url = '',
        public string $area = '',
        public string $studyType = '',
        public ?Carbon $startDate = null,
        public ?Carbon $endDate = null,
        public string $score = '',
        public array $courses = [], 
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            institution: $data['institution'] ?? '',
            url: $data['url'] ?? '',
            area: $data['area'] ?? '',
            studyType: $data['studyType'] ?? '',
            startDate: isset($data['startDate']) ? new Carbon($data['startDate']) : null,
            endDate: isset($data['endDate']) ? new Carbon($data['endDate']) : null,
            score: $data['score'] ?? '',
            courses: $data['courses'] ?? [],
        );
    }
}
