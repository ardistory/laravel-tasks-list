<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TaskEdit extends Component
{
    public $list;
    public $created;
    /**
     * Create a new component instance.
     */
    public function __construct($list, $created)
    {
        $this->list = $list;
        $this->created = $created;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.task-edit');
    }
}
