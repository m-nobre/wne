<?php

namespace App\Livewire\Admin\Forms\Book;

use Livewire\Component;
use App\Models\Language;
use App\Models\MediaType;
use App\Models\PublicationStatus;
use Livewire\Attributes\Validate; 
use Livewire\Attributes\On; 
use App\Models\Genre;

use Tools;

class AdditionalInfo extends Component
{
    public $book;
    public $publish_date;
    public $key;
    public $language_id = NULL;
    public $languages;
    public $media_types;
    public $media_type_id = NULL;
    public $publication_statuses;
    public $publication_status_id = NULL;
    public $genres;
    public $genre_id;
    public $isbn;
    public $isbn13;



    public function mount($book)
    {
        $this->book = $book;
        $this->key = $this->book->key;
        $this->languages = Language::all();
        $this->media_types = MediaType::all();
        $this->publication_statuses = PublicationStatus::all();
        $this->genres = Genre::all();
    }

    public function updatedLanguageId($value)
    {
        $this->book->language_id = $value;
        $this->book->save();
    }

    public function updatedGenreId($value)
    {
        $this->book->genre_id = $value;
        $this->book->save();
    }

    public function updatedMediaTypeId($value)
    {
        $this->book->media_type_id = $value;
        $this->book->save();
    }

    public function updatedPublishDate($value)
    {   
        $this->book->publish_date = $value;
        $this->book->save();
    }
    
    public function updatedIsbn($value)
    {   
        // dd($value);
        $this->book->isbn = $value;
        $this->book->save();
    }

    public function updatedIsbn13($value)
    {   
        // dd($value);
        $this->book->isbn13 = $value;
        $this->book->save();
    }

    #[On('new-entity')] 
    public function newEntity($data)
    {
        $data = json_decode($data, TRUE);

        switch ($data['model']) {
            case 'MediaType':
                    $this->media_types = MediaType::all();
                    $this->media_type_id = $data['id'];
                    $this->book->media_type_id = $data['id'];
                    $this->book->save();
                break;
            case 'Language':
                    $this->languages = Language::all();
                    $this->language_id = $data['id'];
                    $this->book->language_id = $data['id'];
                    $this->book->save();
                break;
                case 'PublicationStatus':
                    $this->publication_statuses = PublicationStatus::all();
                    $this->publication_status_id = $data['id'];
                    $this->book->publication_status_id = $data['id'];
                    $this->book->save();
                break; 
            case 'Genre':
                    $this->genres = Genre::all();
                    $this->genre_id = $data['id'];
                    $this->book->genre_id = $data['id'];
                    $this->book->save();
                break;
            
            default:
                break;
        }
    }

    public function render()
    {
        return view('livewire.admin.forms.book.additional-info');
    }
}
