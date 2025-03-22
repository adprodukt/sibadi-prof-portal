<?php

namespace App\View\Components\Days;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DaysList extends Component
{
    
    /**
     * Create a new component instance.
     */
    public function __construct(
        public array $Days = [],
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.days.list');
    }
}
