<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\Models\v1\SubjectTeacher;
use Database\Seeders\v1\{StudySeeder, SubjectSeeder, TeacherSeeder};

class SubjectTeacherIndexTest extends TestCase
{
    use DatabaseTransactions;

    public function setUp(): void
    {
        parent::setUp();

        $this->seed(StudySeeder::class);
        $this->seed(SubjectSeeder::class);
        $this->seed(TeacherSeeder::class);
    }

    public function test_get_subjects_with_teachers(): void
    {
        SubjectTeacher::factory(3)->create();

        $response = $this->get('/api/v1/subjects-with-teachers');
        $response->assertOk();
        $response->assertJsonStructure([
            '*' => [
                'id',
                'teacher' => [
                    'id',
                    'name'
                ],
                'subject' => [
                    'id',
                    'name'
                ]
            ]
        ]);
    }
}
