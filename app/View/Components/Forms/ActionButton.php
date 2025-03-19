<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Arr;
use Illuminate\View\Component;

class ActionButton extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $route = 'page.index',
        public string $method = 'POST',
        public string $button = 'Отправить',
        public string $type = '',
        public array $routeParameters = [],
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.action-button');
    }
}
