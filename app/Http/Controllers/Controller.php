<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Returns response
     *
     * @param  array  $id
     * @return \Illuminate\Http\Response
     */
    protected function http_response($data, $http_status)
    {
        return response()
            ->json($data, $http_status)
            ->setEncodingOptions(JSON_UNESCAPED_SLASHES)
            ->header('Content-Type', 'application/json');

    }
}
