<?php

namespace App\Livewire\Public;

use Livewire\Component;
use App\Models\Book;

class ShowBooks extends Component
{
    public $books;

    public function mount()
    {
        $this->books = Book::where('key', NULL)->get();
    }

    public function render()
    {
        return view('livewire.public.show-books');
    }
}
