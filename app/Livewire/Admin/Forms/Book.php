<?php

namespace App\Livewire\Admin\Forms;

use Livewire\Component;
use Livewire\Attributes\Validate; 
use Livewire\Attributes\On; 
use App\Models\Book as NewBook;
use Tools;

class Book extends Component
{
    public $book;
    public $key;

    public function mount()
    {
        $this->book = new NewBook;
        $this->key = Tools::key(6,33);
        $this->book->key = $this->key;
        $this->book->save();

    }

    #[On('bookUpdated')] 
    public function bookUpdated($id)
    {
        $this->book = NewBook::find($id);
    }

    public function render()
    {
        return view('livewire.admin.forms.book');
    }
}
