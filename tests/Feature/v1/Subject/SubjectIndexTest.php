<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\Models\v1\{Study, Subject};

class SubjectIndexTest extends TestCase
{
    use DatabaseTransactions;

    public function test_get_subject(): void
    {
        $study = Study::factory()->create();

        $response = $this->get('/api/v1/studies/' . $study->id . '/subjects');
        $response->assertOk();
        $response->assertJsonStructure([
            '*' => [
                'id',
                'name'
            ]
        ]);
    }
}
