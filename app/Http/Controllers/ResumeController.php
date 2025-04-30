<?php

namespace App\Http\Controllers;

use App\Services\ResumeService;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;


class ResumeController extends Controller
{
    public function __construct(
        private readonly ResumeService $resumeService
    ) {
    }

    public function index(): View
    {
        return view('resume', [
            'resume' => $this->resumeService->getResume(),
        ]);
    }

    public function download(): Response
    {
        $resume = $this->resumeService->getResume();

        $pdf = Pdf::loadView('resume', compact('resume'));
        return $pdf->download("{$resume->basics->name}-resume.pdf");
    }
}
