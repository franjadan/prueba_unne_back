<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\Models\v1\Study;

class StudyIndexTest extends TestCase
{
    use DatabaseTransactions;

    public function test_get_studies(): void
    {
        $study = Study::factory(3)->create();

        $response = $this->get('/api/v1/studies');
        $response->assertOk();
        $response->assertJsonStructure([
            '*' => [
                'id',
                'name'
            ]
        ]);
    }
}
