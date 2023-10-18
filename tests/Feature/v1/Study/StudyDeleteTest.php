<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\Models\v1\Study;

class StudyDeleteTest extends TestCase
{
    use DatabaseTransactions;

    public function test_cat_delete_a_study(): void
    {
        $study = Study::factory()->create();

        $response = $this->delete('/api/v1/studies/' . $study->id);
        $response->assertOk();
        $this->assertEquals(0, Study::count());
    }

    public function test_cant_delete_a_not_found_study(): void
    {
        $response = $this->delete('/api/v1/studies/999');
        $response->assertNotFound();
    }
}
