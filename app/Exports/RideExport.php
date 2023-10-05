<?php

namespace App\Exports;

use App\Models\Ride;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class RideExport implements FromCollection, WithHeadings, WithMapping
{
    use Exportable;

    public function __construct(public ?Carbon $beginDate = null, public ?Carbon $endDate = null)
    {

    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        if ($this->beginDate === null && $this->endDate === null) {
            return Ride::all();
        }

        return Ride::whereBetween('date', [$this->beginDate->format('Y-m-d'), $this->endDate->format('Y-m-d')])->get();
    }

    public function headings(): array
    {
        return [
            __('User'),
            __('Previous Mileage'),
            __('Mileage'),
            __('Date'),
            __("Driven km's")
        ];
    }

    public function map($row): array
    {
        $previousMileage = Ride::find($row->id -1);
        return [
            $row->user->name,
            $previousMileage->mileage ?? 0,
            $row->mileage,
            $row->date,
            $row->mileage - $previousMileage?->mileage
        ];
    }
}
