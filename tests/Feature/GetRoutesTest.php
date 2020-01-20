<?php

namespace Tests\Feature;

use Illuminate\Database\Eloquent\Collection;
use Tests\TestCase;

class GetRoutesTest extends TestCase
{
    const ROUTE_STRUCTURE = ['id', 'from', 'to', 'date', 'load_id', 'created_at', 'updated_at', 'selected_load' => ['id', 'name', 'weight', 'created_at', 'updated_at']];

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testRoutes()
    {
        $response = $this->get(route('routes'));
        $response->assertStatus(200);
        $response->assertJsonStructure([self::ROUTE_STRUCTURE]);

        if (!($response->original instanceof Collection)) {
            $this->fail('response object not is Illuminate\Database\Eloquent\Collection');
        }
    }
}
