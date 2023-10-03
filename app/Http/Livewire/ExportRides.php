<?php

namespace App\Http\Livewire;

use App\Exports\RideExport;
use Carbon\Carbon;
use Livewire\Component;

class ExportRides extends Component
{
    public ?Carbon $from = null;
    public ?Carbon $till = null;

    public function export()
    {
        return (new RideExport($this->from, $this->till))->download('rides.xlsx');
    }
    public function render()
    {
        return view('livewire.export-rides');
    }
}
