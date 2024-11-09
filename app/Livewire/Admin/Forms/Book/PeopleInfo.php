<?php

namespace App\Livewire\Admin\Forms\Book;

use Livewire\Component;
use Livewire\Attributes\Validate; 
use App\Models\Book;
use Livewire\Attributes\On; 
use Auth;
use Tools;

/* To populate initially */

class PeopleInfo extends Component
{
    public $publisher_id = NULL;
    public $translator_id = NULL;
    public $editor_id = NULL;
    public $illustrator_id = NULL;
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

    #[Validate('required')] 
    public $author_id = NULL;


    #[On('publisher-selected')]
    public function publisherSelected($id)
    {
        $this->publisher_id = $id;
        $this->book->publisher_id = $id;
        $this->book->save();

    }

    #[On('new-publisher')]
    public function updatedPublisherId($id)
    {
        $this->publisher_id = $id;
        $this->book->publisher_id = $id;
        $this->book->save();

    }
 
    #[On('translator-selected')]
    public function translatorSelected($id)
    {
        $this->translator_id = $id;
        $this->book->translator_id = $id;
        $this->book->save();

    }
    
    #[On('new-translator')]
    public function updatedTranslatorId($id)
    {
        $this->translator_id = $id;
        $this->book->translator_id = $id;
        $this->book->save();

    }
 
    #[On('editor-selected')]
    public function editorSelected($id)
    {
        $this->editor_id = $id;
        $this->book->editor_id = $id;
        $this->book->save();

    }
    
    #[On('new-editor')] 
    public function updatedEditorId($id)
    {
        $this->editor_id = $id;
        $this->book->editor_id = $id;
        $this->book->save();

    }

    #[On('illustrator-selected')]
    public function illustratorSelected($id)
    {
        $this->illustrator_id = $id;
        $this->book->illustrator_id = $id;
        $this->book->save();

    }
 
    
    #[On('new-illustrator')]
    public function updatedIllustratorId($id)
    {
        $this->illustrator_id = $id;
        $this->book->illustrator_id = $id;
        $this->book->save();

    }


    #[On('new-author')]
    public function updatedAuthorId($id)
    {
        $this->author_id = $id;
        $this->book->author_id = $id;
        $this->book->save();

    }

    #[On('author-selected')]
    public function authorSelected($id)
    {
        $this->author_id = $id;
        $this->book->author_id = $id;
        $this->book->save();

    }

    public function render()
    {
        return view('livewire.admin.forms.book.people-info');
    }
}
