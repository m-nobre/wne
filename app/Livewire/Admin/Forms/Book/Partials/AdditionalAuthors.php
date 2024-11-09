<?php

namespace App\Livewire\Admin\Forms\Book\Partials;

use Livewire\Component;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate; 
use Livewire\Attributes\On; 
use Tools;


class AdditionalAuthors extends Component
{

    public Book $book;
    public $key;
    public array $searchResults = [];
    public $additionalAuthorName = NULL;
    public $additional_authors;

    public $list;
    public $person;
    public $newPerson = NULL;
    public $verified = NULL;
    public $update;

    public function mount($book, $key = NULL)
    {
        $this->book = $book;
        $this->key = $this->book->key;
        $this->searchResults = Author::all()->pluck("name", "id")->toArray();
        // $this->publication_status_id = $this->book->publication_status_id;
        $this->additional_authors = json_decode($this->book->additional_authors, TRUE) ?? NULL;
    }
    

    #[On('bookUpdated')] 
    public function bookUpdated($book_id)
    {
        $this->book = Book::find($book_id);
        $this->additional_authors = json_decode($this->book->additional_authors, TRUE) ?? NULL;


    }

    #[On('additionalAuthorSelected')] 
    public function additionalAuthorSelected($id)
    {
        $this->person = Author::find($id);
        if ($this->person) {
            
            $this->newPerson = NULL;
            $this->verified = TRUE;

        }
    }
    
    public function updatedAdditionalAuthorName()
    {
        if($this->additionalAuthorName) {
            // An array of SearchResults

            $temp_results = Author::where('name', 'LIKE' , '%'.$this->additionalAuthorName.'%')->pluck('name', 'id')->toArray();
            
            if ($temp_results) {
                
                $this->newPerson = NULL;
                $this->searchResults = $temp_results;

            } else {

                $this->person = new Author;
                $this->newPerson = TRUE;

                
            }


        } else {
            $this->searchResults = [];
        }

    }

    public function savePerson()
    {
        if($this->person){

            $this->person->name = $this->additionalAuthorName;
            $this->person->slug = Str::slug($this->additionalAuthorName);
            $this->person->save();
            $this->newPerson = NULL;
            $this->verified = TRUE;

        }
    }

    public function addAdditionalAuthor()
    {
        if($this->person){

            $this->additional_authors[$this->person->id] = $this->person->name;
            $this->book->additional_authors = json_encode($this->additional_authors);
            $this->book->save();
            $this->searchResults = Author::all()->whereNotIn('id', array_keys($this->additional_authors))->pluck("name", "id")->toArray();
            $this->newPerson = NULL;
            $this->person = NULL;
            $this->additionalAuthorName = NULL;
            $this->verified = NULL;
        }
    }

    
    public function render()
    {
        return view('livewire.admin.forms.book.partials.additional-authors');
    }
}
