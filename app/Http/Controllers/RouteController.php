<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\RouteGenerator;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

        return (new RouteGenerator())->run();
    }
}
