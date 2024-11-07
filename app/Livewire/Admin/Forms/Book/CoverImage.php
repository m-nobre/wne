<?php

namespace App\Livewire\Admin\Forms\Book;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate; 
use App\Models\Book;
use Livewire\Attributes\On; 
use Auth;
use Tools;



class CoverImage extends Component
{
    use WithFileUploads;
    
    #[Validate('image')]
    public $cover_image;
    public $old_image;
    public $book;
    public $key;

    public function mount($book)
    {
        $this->book = $book;
        $this->key = $this->book->key;
        $this->old_image = !empty($book->cover_image) ? $book->cover_image : NULL;

    }
    
    public function savePhoto()
    {
        $filename = str()->random().".".$this->cover_image->extension();


        $photo = $this->cover_image->storeAs(
            'covers',
            $filename,
            'public'
        );
        
        // dd($photo);


        $this->old_image = NULL;
        $this->book->cover_image = $photo;
        $this->book->save();


    }
    
    public function render()
    {
        return view('livewire.admin.forms.book.cover-image');
    }
}
