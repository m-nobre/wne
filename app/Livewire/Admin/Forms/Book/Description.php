<?php

namespace App\Livewire\Admin\Forms\Book;

use Livewire\Attributes\Validate; 
use Livewire\Attributes\On; 
use Livewire\Component;
use App\Models\Book;
use Tools;
use Auth;

class Description extends Component
{
    public $book;
    public $description;
    public $key;

    public function mount($book)
    {
        $this->book = $book;
        $this->key = $this->book->key;

        $this->description = $this->book->description;

    }

    #[On('bookUpdated')] 
    public function bookUpdated($book_id)
    {
        // Tools::Log('Book Updaated on Description1', $book_id);
        $this->description = '';
        
        $this->book = Book::find($book_id);
        // Tools::Log('Book Updaated on Description2', json_encode($this->book));
        $this->key = $this->book->key;
        // Tools::Log('Book Updaated on Description3', $this->book->key);
        
        $this->description = $this->book->description;
        // Tools::Log('Book Updaated on Description4', $this->description);

        $this->mount($this->book);

    }
    

    public function updatedDescription(){
        $this->book->description = $this->description;
        $this->book->save();
    }

    #[On("description-edited")] 
    public function updateDescriptionData($value, $element)
    {

            $this->description = $value;
            $this->book->description = $value;
            $this->book->save();
        
    }

    public function render()
    {
        return view('livewire.admin.forms.book.description');
    }
}
