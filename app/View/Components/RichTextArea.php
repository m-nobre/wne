<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Tools;

class RichTextArea extends Component
{
    public $key;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->key = Tools::key(6);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.rich-text-area')->with('key', $this->key);
    }
}
