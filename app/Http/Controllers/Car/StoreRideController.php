<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use App\Http\Requests\RideFormRequest;
use App\Models\Ride;

class StoreRideController extends Controller
{
    public function __invoke(RideFormRequest $request)
    {
        Ride::create([
            'user_id' => auth()->user()->id,
            'mileage' => $request->input('mileage'),
            'date' => $request->input('date')
        ]);

        session()->flash('success', __('Successfully created a ride') );
        return redirect()->action(CreateRideController::class);
    }
}
