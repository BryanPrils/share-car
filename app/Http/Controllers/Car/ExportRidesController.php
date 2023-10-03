<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;

class ExportRidesController extends Controller
{
    public function __invoke()
    {
        return view('car.export');
    }
}
