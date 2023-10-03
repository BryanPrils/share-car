<?php

namespace App\View\Components\Forms;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Illuminate\View\Component;

class Label extends Component
{
    public function __construct(
        public string $for
    ) {
    }

    public function fallback(): string
    {
        return Str::ucfirst(str_replace('_', ' ', $this->for));
    }

    public function render(): View
    {
        return view('components.forms.label');
    }
}
