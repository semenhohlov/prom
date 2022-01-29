<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Paginator extends Component
{
    var $perPage;
    var $search;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($perPage, $search)
    {
        $this->perPage = $perPage;
        $this->search = $search;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.paginator');
    }
}
