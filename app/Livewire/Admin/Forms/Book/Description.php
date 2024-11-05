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
    }

    public function updatedDescription(){
        $this->book->description = $this->description;
        $this->book->save();
    }

    #[On("description-edited")] 
    public function updateDescriptionData($value, $element)
    {
        if (explode("-", $element)[1] == $this->key) {
            $this->description = $value;
            $this->book->description = $value;
            $this->book->save();
        }
    }

    public function render()
    {
        return view('livewire.admin.forms.book.description');
    }
}
