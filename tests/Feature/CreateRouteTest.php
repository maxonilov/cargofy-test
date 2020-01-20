<?php

namespace Tests\Feature;

use App\Modules\Route\Models\Route;
use Tests\TestCase;

class CreateRouteTest extends TestCase
{
    const SUCCESS_STRUCTURE = ['status', 'message', 'route'];

    public function getPostData(bool $isSuccess = true): array
    {
        return $isSuccess
            ? ['from' => 'Винница', 'to' => 'Киев', 'date' => '2020-10-10', 'name' => 'Анатолий', 'weight' => 10]
            : ['from' => random_bytes(193), 'weight' => 'Число'];
    }

    private function createRouteTest(bool $isSuccess = true)
    {
        $response = $this->post(route('createRoute'), $this->getPostData($isSuccess));

        $response->assertJsonStructure(self::SUCCESS_STRUCTURE);

        $original = $response->original;

        if (empty($original['status'])) {
            $this->fail('fail response: ' . $original['errors']);
        }

        if (!$response->original instanceof Route) {
            $this->fail('response object not is App\Modules\Route\Models\Route');
        }
    }

    public function testCreateRouteValidData()
    {
        $this->createRouteTest();
    }

    public function testCreateRouteFailData()
    {
        $this->createRouteTest(false);
    }
}
