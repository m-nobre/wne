<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Book;

class BookDash extends Component
{
    public $book;

    public function mount($book_id = NULL)
    {
        if ($book_id) {
            $this->book = Book::find($book_id);
        }
    }

    #[On('edit-book')] 
    public function bookEdit($book_id)
    {
        $this->book = Book::find($book_id);
        $this->dispatch("bookUpdated", book_id: $book_id);
        $this->mount($book_id);

    }

    // #[On('deletedBook')] 
    // public function deletedBook()
    // {
    //     $this->book = Book::orderBy('id', 'desc')->first();
    //     $this->dispatch("bookUpdated", book_id: $this->book->id);
    //     $this->mount($this->book->id);

    // }


    public function render()
    {
        return view('livewire.admin.book-dash');
    }
}
