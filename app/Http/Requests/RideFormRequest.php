<?php

namespace App\Http\Requests;

use App\Models\Ride;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RideFormRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'mileage' => ['required', 'numeric', function ($attribute, $value, $fail) {
                $previousRide = Ride::latest('id')->pluck('mileage')->first();

                if ($previousRide) {
                    if ($value < $previousRide) {
                        $fail("The number must be greater than or equal to {$previousRide} ");
                    }
                } else {
                    if ($value < 0) {
                        $fail("The number must be greater than 0 ");
                    }
                }
            }],
            'date' => ['required', 'date']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
