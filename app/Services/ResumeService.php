<?php
namespace App\Services;

use App\DataObjects\Resume;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class ResumeService
{

    public function getResume(): Resume
    {
        return Cache::remember('resume_object', now()->addDay(), function () {
            $resumeData = json_decode(
                Storage::disk('resumes')->get('resume.json'),
                true
            );
            return Resume::fromArray($resumeData);
        });
    }
}