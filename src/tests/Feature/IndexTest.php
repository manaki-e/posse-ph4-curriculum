<?php

namespace Tests\Feature;

use App\BigQuestion;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IndexTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $big_question = factory(BigQuestion::class)->create();
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee($big_question->name);
    }
}
