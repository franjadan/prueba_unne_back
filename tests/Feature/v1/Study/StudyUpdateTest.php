<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\Models\v1\Study;

class StudyUpdateTest extends TestCase
{
    use DatabaseTransactions;

    public function test_update_a_study(): void
    {
        $study = Study::factory()->create();

        $data = [
            'name' => 'test'
        ];

        $response = $this->put('/api/v1/studies/' . $study->id, $data);
        $response->assertStatus(200);
        $this->assertNotNull(Study::where('name', 'test')->first());
    }

    public function test_cant_update_a_study_without_validation(): void
    {
        $study = Study::factory()->create();

        $data = [];

        $response = $this->put('/api/v1/studies/' . $study->id, $data);
        $response->assertStatus(302);
    }

    public function test_cant_update_a_not_found_study(): void
    {
        $study = Study::factory()->create();

        $data = [
            'name' => 'test'
        ];

        $response = $this->put('/api/v1/studies/999', $data);
        $response->assertNotFound();
    }
}
