<?php

namespace App\Livewire\Admin\Forms\Book\Partials;

use Livewire\Component;
use App\Models\Book;

class BookDelete extends Component
{
    public $books;
    public $book;

    public function mount(){
        $this->books = Book::all();    
    }

    public function editBook($id){
        $book = Book::find($id);
        $this->dispatch("edit-book", book_id: $id);
        $this->dispatch("bookUpdated", book_id: $id);
        $this->dispatch("bookDescription", description: $book->description);

        $this->dispatch("refreshComponent");
    }

    public function deleteBook($id){
        Book::destroy($id);
        $this->books = Book::all();    
    }

    public function render()
    {
        return view('livewire.admin.forms.book.partials.book-delete');
    }
}
