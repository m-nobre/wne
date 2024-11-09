<?php

namespace App\Livewire\Admin\Forms\Book\Partials;

use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate; 
use Livewire\Attributes\On; 
use Tools;
use App\Models\Book;

class CreateNameDescEntity extends Component
{
    public string $name;
    public string $description;
    public $model;
    public $element;

    
    public function mount($model, $element)
    {
        $this->model = $model;
        $this->element = $element;
        $this->name = "";
        $this->description = "";


    }



    public function updatedName($value)
    {
        $this->name = $value;
    }

    public function updatedDescription($value)
    {
        $this->description = $value;
    }

    public function save()
    {   
        $model_path = "App\Models\\".$this->model;
        $entity = new $model_path;

        $entity->name = $this->name;
        $entity->description = $this->description;
        $entity->slug = Str::slug($this->name);

        $entity->save();

        $data = json_encode([
            'model' => $this->model,
            'id' => $entity->id,
            'name' => $entity->name,
            'element' => $this->element,
        ]);

        $this->dispatch('new-entity', data: $data);
        $this->dispatch('close-modal', type: $this->model);

        // switch ($this->model) {
        //     case 'MediaType':
        //         $this->dispatch('close-mediatype');
        //         break;
            
        //     default:
        //         # code...
        //         break;
        //     }

    }

    public function render()
    {
        return view('livewire.admin.forms.book.partials.create-name-desc-entity');
    }
}
