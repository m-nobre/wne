<?php

namespace App\Livewire\Admin\Forms\Book\Partials;

use Livewire\Component;
use App\Models\Book;
use Tools;
class BookDelete extends Component
{
    public $books;
    public $book;
    public $editing_book;
    public $first_run;

    

    public function mount(){
        $this->books = Book::orderBy('created_at', 'desc')->get();  
        $this->first_run = TRUE;
        $this->editing_book = Book::latest()->first()->id;  
  
    }

    public function editBook($id){
        $book = Book::find($id);
        Tools::Log($book->id);

        $this->dispatch("edit-book", book_id: $id);
        $this->dispatch("bookUpdated", book_id: $id);
        $this->dispatch("bookDescription", description: $book->description);
        $this->editing_book = $book->id;
        $this->first_run = NULL;


        // $this->dispatch("refreshComponent");
    }

    public function deleteBook($book_id){
        
        Book::destroy($book_id);
        $this->books = Book::all();  

        $this->book = Book::orderBy('id', 'desc')->first();
        $this->first_run = NULL;

        // Tools::Log($this->book->id);
        $this->editBook($this->book->id);
  
    }

    public function hideBook($id){
 
        $book = Book::find($id);   
        $key = Tools::key(6,33);
        $book->key = $key;
        $book->save(); 
    }

    public function render()
    {
        return view('livewire.admin.forms.book.partials.book-delete');
    }
}
