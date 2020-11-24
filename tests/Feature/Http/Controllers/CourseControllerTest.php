<?php

namespace Tests\Feature\Http\Controllers;

use Database\Seeders\CourseSeed;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CourseControllerTest extends TestCase
{
    use RefreshDatabase;

    public $seed = CourseSeed::class;

    protected function setUp(): void
    {
        parent::setUp();

        $this->migrateFreshUsing();
    }

    /**
     * Test index route
     *
     * @return void
     */
    public function testIndex(): void
    {
        $response = $this->get(route('api.courses.index'));

        $response->assertStatus(200);
        $response->assertJson([
            'data' => [
                [
                    'course_no' => '6259',
                    'name'      => 'Svendeprøveprojekt',
                ],
            ],
        ]);
    }

    public function testShow(): void
    {
        $response = $this->get(route('api.courses.index', ['courseNo' => '16471']));

        $response->assertStatus(200);
        $response->assertJson([
            'data' => [
                'course_no' => '16471',
                'name'      => 'Grundlæggende programmering',
            ],
        ]);
    }

    public function testShowFails(): void
    {
        $response = $this->get(route('api.courses.index', ['courseNo' => '0']));

        $response->assertStatus(404);
    }
}
