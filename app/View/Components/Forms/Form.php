<?php

namespace App\View\Components\Forms;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Form extends Component
{
    public function __construct(
        public string $action,
        public string $method = 'POST',
        public bool $hasFiles = false
    ) {
        $this->method = strtoupper($method);
    }

    public function render(): View
    {
        return view('components.forms.form');
    }
}
