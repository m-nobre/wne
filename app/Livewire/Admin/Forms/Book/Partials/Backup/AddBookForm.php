<?php

namespace App\Livewire\Admin\Forms\Book\Partials\Backup;
use Livewire\WithFileUploads;


use Livewire\Component;
use Livewire\Attributes\Validate; 
use App\Models\Book;
use Livewire\Attributes\On; 
use Auth;
use Tools;

/* To populate initially */

use App\Models\Language;
use App\Models\PublicationStatus;
use App\Models\MediaType;
use App\Models\Genre;

class AddBookForm extends Component
{
    use WithFileUploads;

/* DECLARATIONS */

    /* Base book info */

        #[Validate('required')] 
        public $title = NULL;
        #[Validate('required')] 
        public $subtitle = NULL;
        #[Validate('required')] 
        public $description = NULL;

        #[Validate('image')]
        public $cover_image;

    /* Other book Info */

        public $publish_date;
        public $genre_id = NULL;
        public $language_id = NULL;
        public $publication_status_id = NULL;

        public $media_type_id = NULL;

    /* book people  */

        public $publisher_id = NULL;
        public $translator_id = NULL;
        public $editor_id = NULL;
        public $illustrator_id = NULL;
    
        #[Validate('required')] 
        public $author_id = NULL;

    /* book json parts */

        public $keywords = [];
        public $keyword = NULL;
        public $additional_authors = [];

        public $keyword_list;
        public $additional_authors_input;
    
    /* Core & Startup */

        public $book;
        public $book_id;

        public $languages;
        public $publication_statuses;
        public $media_types;
        public $genres;




/* CORE FUNCTIONS */
    
    /* Data that needs to be available to populate select boxes:
        - Languages
        - Publication Status Types
        - Media Types
    
    */
    public function mount()
    {
        $this->book = new Book;
        $this->languages = Language::all();
        $this->publication_statuses = PublicationStatus::all();
        $this->media_types = MediaType::all();
        $this->genres = Genre::all();
    }

    public function save()
    { 
        $this->book->save();
    }


    #[On('newList')] 
    public function newList($list)
    {
        $this->keyword_list = $list;
        $this->book->keywords = json_encode($list);
        $this->book->save();
    }

    #[On('additionalAuthorAdded')] 
    public function additionalAuthorAdded($list)
    {
        $this->additional_authors = $list;
        $this->book->additional_authors = json_encode($list);
        $this->book->save();
        
    }

    #[On('new-entity')] 
    public function newEntity($data)
    {
        $data = json_decode($data, TRUE);
        
        switch ($data['model']) {
            case 'MediaType':
                $this->media_types = MediaType::all();
                break;
            case 'Language':
                $this->languages = Language::all();
                break;
            case 'PublicationStatus':
                $this->publication_statuses = PublicationStatus::all();
                break; 
            case 'Genre':
                $this->genres = Genre::all();
                break;
            
            default:
                # code...
                break;
        }
    }


    public function render()
    {
        return view('livewire.admin.forms.book.partials.backup.add-book-form');
    }

/*  TITLE, SUBTITLE AND DESCRIPTION */

    public function updatedTitle($value)
    {
        $this->book->title = $value;
        $this->book->save();

    }

    public function updatedSubtitle($value)
    {
        $this->book->subtitle = $value;
        $this->book->save();

    }
 
    public function updatedDescription($value)
    {
        $this->book->description = $value;
        $this->book->save();

    }
 
/* IMAGE SECTION */

    public function savePhoto()
    {
        $filename = str()->random().".".$this->cover_image->extension();


        $photo = $this->cover_image->storeAs(
            'covers',
            $filename,
            'public'
        );
        
        // dd($photo);


        $this->book->cover_image = $photo;
        $this->book->save();


    }
    
/* OTHER INFO SELECT SECTION */ 

    public function updatedPublishDate($value)
    {   
        // dd($value);
        $this->book->publish_date = $value;
        $this->book->save();

    }
 
    public function updatedGenreId($value)
    {
        $this->book->genre_id = $value;
        $this->book->save();

    }
 
    public function updatedLanguageId($value)
    {
        $this->book->language_id = $value;
        $this->book->save();

    }
 
    public function updatedPublicationStatusId($value)
    {
        $this->book->publication_status_id = $value;
        $this->book->save();

    }
 
    public function updatedMediaTypeId($value)
    {
        $this->book->media_type_id = $value;
        $this->book->save();

    }

/* PEOPLE SECTION */ 
 
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

/* KEYWORDS AND ADDITIONAL AUTHORS SECTION */

    public function updatedKeyword($value)
    {
        // Tools::log("updatedKeyword", $value);

        $this->keyword = $value;
    }

    public function addKeyword()
    {
        // Tools::log("addKeyword", $this->keyword);
        $this->keywords[] = $this->keyword;
        // $this->book->keywords = json_encode(array_unique($this->keywords));
        // Tools::log("addKeywords", $this->keywords);
        // $this->book->save();
    }
    

}
