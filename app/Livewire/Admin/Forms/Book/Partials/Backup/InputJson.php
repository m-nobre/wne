<?php

namespace App\Livewire\Admin\Forms\Book\Partials\Backup;

use Livewire\Component;
use App\Models\Author;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Livewire\Attributes\On;


class InputJson extends Component
{
    public string $name = '';
    public string $model = '';
    public array $searchResults = [];
    public $newPerson = NULL;
    public $path = "App\\Models\\";
    public $list = [];
    public $list_name;
    public $person;
    public $verified = NULL;
    public $listener;
    public $personId;
    public $searchBackup;
    public $key;



    
    public function mount($model,  $list_name)
    {
        $permitted = ['author', 'illustrator', 'editor', 'translator', 'pulisher'];
        
        $this->list_name = $list_name;

        $this->path = trim($this->path .= ucFirst($model));
        $this->listener = trim('json'.ucfirst($this->model).'nameSelected');

        $this->key = Str::random(6);

        
        if (in_array($model, $permitted)) {
            
            $this->searchResults = $this->path::all()->pluck("name", "id")->toArray();
            $this->searchBackup = $this->searchResults;

        } else {
            
            return "Modelo não permitido";

        }
    }

    #[On("jsonAuthornameSelected")]
    public function nameSelected($author_id)
    {
        $this->personId = $author_id;
        $this->person = $this->path::find($author_id);
        if ($this->person) {
            $this->name =  $this->person->name;
            $this->verified = TRUE;
        }
    }
    
    public function updatedName($name)
    {

        if(!empty($name)) {

            if (!$this->person) {

                $temp_results = $this->path::where('name', 'LIKE' , '%'.$this->name.'%')->pluck('name', 'id')->toArray();
                
                if ($temp_results) {
                    
                    $this->newPerson = NULL;    
                    $this->searchResults = $temp_results;
    
                } else {
    
                    $this->person = new $this->path;
                    $this->newPerson = TRUE;
    
                    
                }
            }


        } else {
            $this->verified = NULL;

            $this->searchResults = $this->searchBackup;
        }
    }

    public function savePerson()
    {
        if($this->person){

            $this->person->name = $this->name;
            $this->person->slug = Str::slug($this->name);
            $this->person->save();
            $this->newPerson = NULL;
            $this->verified = TRUE;


        }
    }

    public function jsonAdd()
    {
        if (!empty($this->name && !empty($this->person))) {
            $this->list[$this->person->id] = $this->name;
            $this->dispatch('newList', list: array_unique($this->list));
            $this->searchResults = $this->searchBackup;
            $this->newPerson = NULL;
            $this->verified = NULL;

        }

    }

    public function render()
    {
        return view('livewire.admin.forms.book.partials.backup.input-json');
    }
}
