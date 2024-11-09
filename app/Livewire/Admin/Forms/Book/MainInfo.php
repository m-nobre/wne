<?php

namespace App\Livewire\Admin\Forms\Book;

use Livewire\Component;
use Livewire\Attributes\Validate; 
use Livewire\Attributes\On; 
use App\Models\Book;

class MainInfo extends Component
{
    public $book;

    #[Validate('required')] 
    public $title = NULL;
    public $subtitle = NULL;
    public $key;

    public function mount($book, $key = NULL)
    {
        $this->book = $book;
        $this->key = $key;
        $this->title = !empty($book->title) ? $book->title : NULL;
        $this->subtitle = !empty($book->subtitle) ? $book->subtitle : NULL;
    }

    #[On('edit-book')] 
    public function bookEdit($book_id)
    {
        $this->book = Book::find($book_id);
        $this->mount($this->book);
    }
    public function updatedBook($book){
        $this->book = $book;
    }

    public function updatedTitle(){
        $this->book->title = $this->title;
        $this->book->save();
    }

    public function updatedSubtitle(){
        $this->book->subtitle = $this->subtitle;
        $this->book->save();
    }

    public function render()
    {
        return view('livewire.admin.forms.book.main-info');
    }
}
