<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ResumeControllerTest extends TestCase
{
    public function test_resume_page_loads_successfully()
    {
        $resumeData = [
            'basics' => [
                'name' => 'John Doe',
                'label' => 'Software Developer',
                'email' => 'john@example.com',
                'summary' => 'A passionate developer',
                'location' => [
                    'city' => 'New York',
                    'region' => 'NY'
                ],
                'profiles' => []
            ],
            'work' => [],
            'skills' => [],
            'projects' => []
        ];

        Storage::fake('resumes');
        Storage::disk('resumes')->put('resume.json', json_encode($resumeData));

        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('John Doe');
        $response->assertSee('Software Developer');
        $response->assertSee('john@example.com');
        $response->assertSee('A passionate developer');
    }

    public function test_pdf_downloaded_successfully()
    {
        $resumeData = [
            'basics' => [
                'name' => 'John Doe',
                'label' => 'Software Developer',
                'email' => 'john@example.com',
                'summary' => 'A passionate developer',
                'location' => [
                    'city' => 'New York',
                    'region' => 'NY'
                ],
                'profiles' => []
            ],
            'work' => [],
            'skills' => [],
            'projects' => []
        ];

        Storage::fake('resumes');
        Storage::disk('resumes')->put('resume.json', json_encode($resumeData));

        $response = $this->post('/download');
        $response->assertStatus(200);

        $response->assertHeader('Content-Type', 'application/pdf');
        $response->assertHeader('Content-Disposition');
    }
}