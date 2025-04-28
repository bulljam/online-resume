<?php

namespace App\Http\Controllers;

use App\DataObjects\Resume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ResumeController extends Controller
{
    public function index()
    {
        $resumeData = json_decode(Storage::disk('resumes')->get('resume.json'), true);
        $resume = Resume::fromArray($resumeData);

        return view('resume', compact('resume'));
    }
}
