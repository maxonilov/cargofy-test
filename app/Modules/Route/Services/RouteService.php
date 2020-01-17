<?php


namespace App\Modules\Route\Services;


use App\Modules\Route\Models\Load;
use App\Modules\Route\Models\Route;

class RouteService
{
    /**
     * @param array $data
     * @return Route
     */
    public static function create(array $data): Route
    {
        $load = Load::create(['name' => $data['name'], 'weight' => $data['weight']]);

        return Route::create(['from' => $data['from'], 'to' => $data['to'], 'date' => $data['date'], 'load_id' => $load->id]);
    }
}