<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\Models\v1\Study;

class StudyCreateTest extends TestCase
{
    use DatabaseTransactions;

    public function test_create_a_study(): void
    {
        $data = [
            'name' => 'test'
        ];

        $response = $this->post('/api/v1/studies', $data);
        $response->assertStatus(200);
        $this->assertEquals(1, Study::count());
    }

    public function test_cant_create_a_study_without_validation(): void
    {
        $data = [];

        $response = $this->post('/api/v1/studies', $data);
        $response->assertStatus(302);
    }
}
