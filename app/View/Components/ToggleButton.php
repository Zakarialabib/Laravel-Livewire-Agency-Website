<?php

declare(strict_types=1);

namespace App\View\Components;

use Illuminate\View\Component;
use Closure;

class ToggleButton extends Component
{
    /** Create a new component instance. */
    public function __construct()
    {
    }

    /** @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\Support\Htmlable|Closure|string */
    public function render()
    {
        return view('components.toggle-button');
    }
}
