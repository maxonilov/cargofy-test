<?php

namespace App\Modules\Route\Http\Controllers;

use App\Modules\Route\Http\Requests\CreateRouteRequest;
use App\Modules\Route\Models\Route;

use App\Http\Controllers\Controller;
use App\Modules\Route\Services\RouteService;
use Illuminate\Http\Response;

class RouteController extends Controller
{
    /**
     * @return Response
     */
    public function all(): Response
    {
        return response(Route::with('selectedLoad')->get());
    }

    /**
     * @param CreateRouteRequest $request
     * @return Response
     */
    public function create(CreateRouteRequest $request): Response
    {
        if (($validate = $request->validate())->fails()) {
            return \response(['status' => 0, 'errors' => $validate->errors()]);
        }

        return \response(['status' => 1, 'message' => 'Збережено!', 'route' => RouteService::create($validate->validated())]);
    }
}
