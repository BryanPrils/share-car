<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use App\Models\Ride;

class CreateRideController extends Controller
{
    public function __invoke()
    {
        $mileage = Ride::latest('id')->pluck('mileage')->first() ?? 0;

        return view('car.create-ride', compact('mileage'));
    }
}
