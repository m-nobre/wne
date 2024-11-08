<?php

namespace App\Livewire\Admin\Forms\Book\Partials;

use Livewire\Component;

class AddKeyword extends Component
{
    public $verified = NULL;
    public $new_keyword = NULL;
    public $keywords = NULL;
    public $book;

    public function mount($book)
    {
        $this->book = $book;
        $this->key = $this->book->key;
        $this->keywords = json_decode($this->book->keywords, TRUE) ?? NULL;

    }


    public function updatedNewKeyword()
    {
        if ($this->new_keyword != '') {
            $this->verified = TRUE;
        } else {
            $this->verified = FALSE;
        }
    }


    public function addKeyword()
    {
        if ($this->new_keyword != '') {

            $this->keywords[] = $this->new_keyword;
            $this->book->keywords = json_encode($this->keywords, JSON_FORCE_OBJECT);
            $this->book->save();
            $this->new_keyword = NULL;
            $this->verified = NULL;
        
        }
    }

    public function render()
    {
        return view('livewire.admin.forms.book.partials.add-keyword');
    }
}
