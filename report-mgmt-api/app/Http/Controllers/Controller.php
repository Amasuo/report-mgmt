<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponse;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, ApiResponse;

    protected $modelId = null;

    public function __construct(Request $request)
    {
        if ($modelId = $request->route('id'))
            $this->modelId = $modelId;
    }

    protected function validateId()
    {
        if (is_null($this->modelId))
            $this->abort(__('app::global.model_id_missing'));
    }
}
