<?php

namespace App\Http\Controllers;

use App\DataObjects\Resume;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class ResumeController extends Controller
{
    public function index()
    {
        $resume = Cache::remember('resume_object', now()->addDay(), function () {
            $resumeData = json_decode(
                Storage::disk('resumes')->get('resume.json'),
                true
            );
            return Resume::fromArray($resumeData);
        });

        return view('resume', compact('resume'));
    }

    public function download()
    {
        $resume = Cache::remember('resume_object', now()->addDay(), function () {
            $resumeData = json_decode(
                Storage::disk('resumes')->get('resume.json'),
                true
            );
            return Resume::fromArray($resumeData);
        });

        $pdf = Pdf::loadView('resume', compact('resume'));
        return $pdf->download("{$resume->basics->name}-resume.pdf");
    }
}
