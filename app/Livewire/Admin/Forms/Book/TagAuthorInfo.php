<?php

namespace App\Livewire\Admin\Forms\Book;

use Livewire\Component;
use Livewire\Attributes\Validate; 
use Livewire\Attributes\On; 
use App\Models\Book;
use Auth;
use Tools;

class TagAuthorInfo extends Component
{
    public $keywords = [];
    public $keyword = NULL;
    public $additional_authors = [];

    public $keyword_list;
    public $additional_authors_input;
    public $book;
    public $key;

    public function mount($book, $key = NULL)
    {
        $this->book = $book;
        $this->key = $this->book->key;
    }

    #[On('edit-book')] 
    public function bookEdit($book_id)
    {
        $this->book = Book::find($book_id);
        $this->mount($this->book);
    }
    
    #[On('additionalAuthorAdded')] 
    public function additionalAuthorAdded($list)
    {
        $this->additional_authors = $list;
        $this->book->additional_authors = json_encode($list);
        $this->book->save();
        
    }

    #[On('newList')] 
    public function newList($list)
    {
        $this->keyword_list = $list;
        $this->book->keywords = json_encode($list);
        $this->book->save();
    }

    public function updatedKeyword($value)
    {
        $this->keyword = $value;
    }

    public function addKeyword()
    {
        $this->keywords[] = $this->keyword;
        $this->book->keywords = json_encode($this->keywords);
        $this->book->save();
        $this->keyword = NULL;
    }

    public function render()
    {
        return view('livewire.admin.forms.book.tag-author-info');
    }
}
