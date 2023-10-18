<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\Models\v1\Teacher;

class TeacherIndexTest extends TestCase
{
    use DatabaseTransactions;

    public function test_get_teachers(): void
    {
        Teacher::factory(3)->create();

        $response = $this->get('/api/v1/subjects-with-teachers');
        $response->assertOk();
        $response->assertJsonStructure([
            '*' => [
                'id',
                'name'
            ]
        ]);
    }
}
