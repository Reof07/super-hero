<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *     title="Super-Hero API Documentation",
 *     version="0.1",
 * ),
 * @OA\PathItem(path="/api"),
 * @OA\Server(
 *      description="SuperHero env",
 *      url="http://localhost:8000/api/v1/"
 *  )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
