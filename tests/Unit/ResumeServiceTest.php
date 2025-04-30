<?php
namespace Tests\Unit;

use App\DataObjects\Resume;
use App\Services\ResumeService;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ResumeServiceTest extends TestCase
{
    public function test_get_resume_returns_resume_instance_successfully()
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

        Cache::flush();
        Storage::fake('resumes');
        Storage::disk('resumes')->put('resume.json', json_encode($resumeData));

        $resumeService = new ResumeService();
        $beforeCachingResult = $resumeService->getResume();
        $this->assertInstanceOf(Resume::class, $beforeCachingResult);
        $this->assertResumePropertiesEquals($resumeData, $beforeCachingResult);


        $cached = Cache::get('resume_object');
        $afterCachingResult = $resumeService->getResume();

        $this->assertSame($afterCachingResult, $cached);

    }

    private function assertResumePropertiesEquals(array $data, $result)
    {
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $this->assertArrayEquals($data, $key, $result);
            } else {
                $this->assertEquals($value, $result->$key);
            }
        }

    }

    private function assertArrayEquals(array $_Array, string $key, $result)
    {
        foreach ($field = $_Array[$key] as $k => $v) {
            if (is_array($v)) {
                $this->assertSubArrayEquals($field, $key, $k, $result);
            } else {
                $this->assertEquals($v, $result->$key->$k);
            }
        }
    }
    private function assertSubArrayEquals(array $subArray, string $key, string $subkey, $result)
    {
        foreach ($subArray[$subkey] as $k => $v) {
            $this->assertEquals($v, $result->$key->$subkey->$k);
        }
    }
}