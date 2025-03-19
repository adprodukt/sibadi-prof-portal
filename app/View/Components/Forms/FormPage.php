<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormPage extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $title = 'Форма отправки данных',
        public string $route = 'page.index',
        public string $method = 'POST',
        public string $button = 'Отправить',
        )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.form-page');
    }
}
