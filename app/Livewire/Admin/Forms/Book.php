<?php

namespace App\Livewire\Admin\Forms;

use Livewire\Component;
use Livewire\Attributes\Validate; 
use Livewire\Attributes\On; 
use App\Models\Book as NewBook;

use Tools;

class Book extends Component
{
    public $update; 
    public $book;
    public $key;
    public $editing_book;

    public function mount($book_id = NULL, $key = NULL)
    {
        if (!$book_id) {
            
            /* create a filter to pick up last empty record to avoid repetition */

            $last = NewBook::orderBy('id', 'desc')->first();

            if (   
                    !empty($last->key) && 
                    empty($last->title) &&
                    empty($last->subtitle) &&
                    empty($last->isbn) &&
                    empty($last->isbn13) &&
                    empty($last->description) &&
                    empty($last->cover_image)
                )
            {
                
                $this->book = $last;

            } else {

                NewBook::whereNotNull('key')
                    ->whereNull('title')
                    ->whereNull('subtitle')
                    ->whereNull('isbn')
                    ->whereNull('isbn13')
                    ->whereNull('description')
                    ->whereNull('cover_image')
                ->delete();

                $this->book = new NewBook;

            }

            
            // $this->book = NewBook::find($book_id);

            $this->key = Tools::key(6,33);
            $this->book->key = $this->key;
            $this->book->save();

        } else {

            $this->book = NewBook::find($book_id);


        }

        $this->editing_book = $this->book->id;

    }

    // #[On('deletedBook')] 
    // public function deletedBook()
    // {
    //     $this->book = Book::orderBy('id', 'desc')->first();
    //     $this->mount($this->book->id);
    //     $this->editing_book = $this->book->id;

    // }

    
    public function updateBook()
    {  
        $this->mount($this->book);
    }

    #[On('refreshComponent')] 
    public function refreshComponent() {
        $this->update = !$this->update;
    }
    
    #[On('edit-book')] 
    public function bookEdit($book_id)
    {
        $this->mount($book_id);
        $this->editing_book = $book_id;
    }

    #[On('bookUpdated')] 
    public function bookUpdated($book_id)
    {
        $this->book = NewBook::find($book_id);
        $this->update = !$this->update;

    }

    public function saveBook()
    {
        $this->book->key = NULL;
        $this->book->save();
    }

    public function render()
    {
        return view('livewire.admin.forms.book');
    }
}
