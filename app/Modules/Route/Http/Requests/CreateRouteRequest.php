<?php

namespace App\Modules\Route\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CreateRouteRequest
{
    /**
     * @var Request
     */
    private $request;

    /**
     * CreateRouteRequest constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'from'   => 'required|max:191',
            'to'     => 'required|max:191',
            'date'   => 'required|date_format:Y-m-d',
            'name'   => 'required|max:191',
            'weight' => 'required|integer',
        ];
    }

    /**
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validate(): \Illuminate\Contracts\Validation\Validator
    {
        return Validator::make($this->request->all(), $this->rules());
    }
}
