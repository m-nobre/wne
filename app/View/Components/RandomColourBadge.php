<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RandomColourBadge extends Component
{
    public $colour;
    public $value;

    /**
     * Create a new component instance.
     */
    public function __construct($value)
    {
        $colours = [
            'slate',
            'gray',
            'zinc',
            'neutral',
            'stone',
            'red',
            'orange',
            'amber',  
            'yellow',  
            'lime',  
            'green',  
            'emerald',  
            'teal',  
            'cyan',  
            'sky',  
            'blue',  
            'indigo',  
            'violet',  
            'purple',  
            'fuchsia',  
            'pink',  
            'rose',  
        ];

        $this->colour =  $colours[array_rand($colours, 1)];
        $this->value = $value;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.random-colour-badge')->with(['colour' => $this->colour, 'value' => $this->value]);
    }
}
