<?php

namespace App\Livewire\Admin;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Livewire\Component;
use App\Models\Author;
use Illuminate\Support\Str;


class PersonInput extends Component
{
    public string $name = '';
    public string $model = '';
    public array $searchResults = [];
    public $newPerson = NULL;
    public $path = "App\\Models\\";
    public $list;
    public $person;



    
    public function mount($model)
    {
        $permitted = ['author', 'illustrator', 'editor', 'translator', 'pulisher'];
        
        $this->model = $model;
        $this->path = trim($this->path .= ucFirst($model));
        
        if (in_array($model, $permitted)) {
            
            $this->searchResults = $this->path::all()->pluck("name", "id")->toArray();
            // dd($this->searchResults);
        } else {
            return "Modelo não permitido";
        }
    }

    // Magic method that is fired when `streetAddress` is updated
    public function updatedName($name)
    {

        if(!empty($this->name)) {
            // An array of SearchResults

            $temp_results = $this->path::where('name', 'LIKE' , '%'.$this->name.'%')->pluck('name', 'id')->toArray();
            
            if ($temp_results) {
                
                $this->newPerson = NULL;
                $this->searchResults = $temp_results;

            } else {

                $this->person = new $this->path;
                $this->newPerson = TRUE;

                
            }


        } else {
            $this->newPerson = NULL;
            $this->searchResults = [];
        }
    }

    public function savePerson()
    {
        if($this->person){

            $this->person->name = $this->name;
            $this->person->slug = Str::slug($this->name);
            $this->person->save();
            $this->newPerson = NULL;


            switch ($this->model) {
                case 'author':
                    $this->dispatch('new-author', id: $this->person->id);
                    break;
                
                case 'illustrator':
                    $this->dispatch('new-illustrator', id: $this->person->id);
                    break;
                
                case 'editor':
                    $this->dispatch('new-editor', id: $this->person->id);
                    break;
                
                case 'translator':
                    $this->dispatch('new-translator', id: $this->person->id);
                    break;
                
                case 'publisher':
                    $this->dispatch('new-publisher', id: $this->person->id);
                    break;
                
                default:
                    # code...
                    break;
            }

        }

        // if(empty($this->newPerson)){
        //     $this->newPerson = trim($this->path)::firstOrCreate([
        //         'name' => $this->name,
        //         'slug' => Str::slug($this->name),
        //     ]);

        // } else {
        //     $this->newPerson->name = $this->name;
        //     $this->newPerson->slug = Str::slug($this->name);
        //     $this->newPerson->save();
        // }
    }
    
    public function render()
    {
        return view('livewire.admin.person-input');
    }
}
