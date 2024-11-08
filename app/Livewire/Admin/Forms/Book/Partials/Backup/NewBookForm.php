<?php

namespace App\Livewire\Admin\Forms\Book\Partials\Backup;

use Livewire\Component;

class NewBookForm extends Component
{
    public string $key;
    public array $book_container;
    #[Validate('required')] 
    public string $title_input;
    public string $subtitle_input;
    public string $description_input;
    public $rich_text = TRUE;
    
    public function mount($key)
    {
        $this->key = $key;
        $this->book_container['key'] = $key;
        $this->rich_text = TRUE;
    }
    
    /* UPDATED FIELDS */

    /* public string $title_input */
    public function updatedTitleInput($value)
    {
        $this->title_input = $value;
        $this->book_container['title'] = $this->title_input;

    }

    /* public string $subtitle_input */
    public function updatedSubtitleInput($value)
    {
        $this->subtitle_input = $value;
        $this->book_container['subtitle'] = $this->subtitle_input;
    }

    /* public string $description_input */
    public function updatedDescriptionInput($value)
    {
        $this->description_input = $value;
        $this->book_container['description'] = $this->description_input;
    }
    

    public function render()
    {
        return view('livewire.admin.forms.book.partials.backup.new-book-form');
    }
}
