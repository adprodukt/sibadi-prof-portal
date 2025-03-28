<?php

namespace App\View\Components\forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Form extends Component
{

    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $route = 'page.index',
        public string $method = 'POST',
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.form');
    }
}
