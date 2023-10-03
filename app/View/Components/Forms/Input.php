<?php

namespace App\View\Components\Forms;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    public function __construct(
        public string $name,
        public ?string $id = null,
        public string $type = 'text',
        public ?string $value = ''
    ) {
        $this->id = $id ?? $name;
        $this->value = old($name, $value ?? '');
    }

    public function render(): View
    {
        return view('components.forms.input');
    }
}
