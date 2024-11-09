<?php

namespace App\Livewire\Admin\Forms\Book\Partials\Backup;

use Livewire\Component;
use App\Models\Book;
use Auth;
use Tools;

class BookDashboard extends Component
{
    public Book $book;
    public $key;
    public $user_id;

    public function mount() {
        $this->book = new Book();
        $this->key = Tools::Key(6);
        $this->user_id = Auth::id();
    }

    public function render()
    {
        return view('livewire.admin.forms.book.partials.backup.book-dashboard');
    }
}
