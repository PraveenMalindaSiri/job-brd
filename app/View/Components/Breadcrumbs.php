<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Breadcrumbs extends Component
{
    public function __construct(public array $links) // all the attributes that r not in the 
    {
        //
    }

    public function render(): View|Closure|string
    {
        return view('components.breadcrumbs');
    }
}
