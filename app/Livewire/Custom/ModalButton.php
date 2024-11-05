<?php

namespace App\Livewire\Custom;

use Livewire\Component;
use Illuminate\Support\Str;


class ModalButton extends Component
{
    public $model = NULL;
    public $view = NULL;
    public $type = NULL;
    public $icon = NULL;
    public $colour = NULL;
    public $element = NULL;
    public $key ;

    public function mount($model, $element, $view, $type, $icon, $colour = "slate")
    {
        $this->model = $model;
        $this->element = $element;
        $this->view = $view;
        $this->type = $type;
        $this->icon = $icon;
        $this->colour = $colour;
        $this->key = Str::random(6);
    }

    public function render()
    {
        return view('livewire.custom.modal-button');
    }
}
