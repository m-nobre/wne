<?php

namespace App\Livewire\Admin\Forms\Book\Partials;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate; 
use Livewire\Attributes\On; 
use Tools;
use App\Models\Book;


class PersonInput extends Component
{
    public string $name = '';
    public string $model = '';
    public array $searchResults = [];
    public $newPerson = NULL;
    public $path = "App\\Models\\";
    public $list;
    public $person;
    public $update;



    
    public function mount($book, $model, $old_value)
    {
        $permitted = ['author', 'illustrator', 'editor', 'translator', 'publisher'];
        
        $this->model = $model;
        $this->path = trim($this->path .= ucFirst($model));
        
        if (!in_array($model, $permitted)) {
            return "Modelo não permitido";
        } 

        $this->book = $book;
        
        $this->searchResults = $this->path::all()->pluck("name", "id")->toArray();

        switch ($this->model) {
            case 'author':
                $this->author_id = $this->book->author_id;
                $this->name = $this->book->author->name ?? "";
                break;
            
            case 'illustrator':
                $this->illustrator_id = $this->book->illustrator_id;
                $this->name = $this->book->illustrator->name ?? "";

                break;
            
            case 'editor':
                $this->editor_id = $this->book->editor_id;
                $this->name = $this->book->editor->name ?? "";

                break;
            
            case 'translator':
                $this->translator_id = $this->book->translator_id;
                $this->name = $this->book->translator->name ?? "";

                break;
            
            case 'publisher':
                $this->publisher_id = $this->book->publisher_id;
                $this->name = $this->book->publisher->name ?? "";

                break;
            
            default:
                # code...
                break;
        }
        
    }

    #[On('bookUpdated')] 
    public function bookUpdated($book_id)
    {
        // Tools::Log("aoersin ubs", $book_id);
        $this->book = Book::find($book_id);
        switch ($this->model) {
            case 'author':
                $this->author_id = $this->book->author_id;
                $this->name = $this->book->author->name ?? "";
                break;
            
            case 'illustrator':
                $this->illustrator_id = $this->book->illustrator_id;
                $this->name = $this->book->illustrator->name ?? "";

                break;
            
            case 'editor':
                $this->editor_id = $this->book->editor_id;
                $this->name = $this->book->editor->name ?? "";

                break;
            
            case 'translator':
                $this->translator_id = $this->book->translator_id;
                $this->name = $this->book->translator->name ?? "";

                break;
            
            case 'publisher':
                $this->publisher_id = $this->book->publisher_id;
                $this->name = $this->book->publisher->name ?? "";

                break;
            
            default:
                # code...
                break;
        }

    }



    #[On('refreshComponent')] 
    public function refreshComponent() {
        $this->update = !$this->update;
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
    }
    
    public function render()
    {
        return view('livewire.admin.forms.book.partials.person-input');
    }
}
