<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'key',
        'isbn',
        'isbn13',
        'title',
        'subtitle',
        'description',
        'cover_image',
        'publish_date',
        'genre_id',
        'language_id',
        'publication_status_id',
        'media_type_id',
        'publisher_id',
        'translator_id',
        'editor_id',
        'illustrator_id',
        'author_id',
        'keywords',

    ];

    /**
     * Get the author that the book belongs to.
     */
    public function author()
    {
        return $this->belongsTo(Author::CLASS);
    }

    /**
     * Get the Editor that the book belongs to.
     */
    public function editor()
    {
        return $this->belongsTo(Editor::CLASS);
    }

    /**
     * Get the media type format of the book.
     */
    public function media_type()
    {
        return $this->hasOne(MediaType::CLASS);
    }

    /**
     * Get the language of the book.
     */
    public function language()
    {
        return $this->belongsTo(Language::CLASS);
    }

    /**
     * Get the publisher of the book.
     */
    public function publisher()
    {
        return $this->belongsTo(Publisher::CLASS);
    }

    /**
     * Get the status of the book.
     */
    public function publication_status()
    {
        return $this->hasOne(PublicationStatus::CLASS);
    }


    /**
     * The translators that translated the book.
     */
    public function translator()
    {
        return $this->belongsTo(Translator::class);
    }

    /**
     * The genres that belong to the book.
     */
    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    /**
     * The genres that belong to the book.
     */
    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }

    /**
     * The illustrators that illustratated the book.
     */
    public function illustrator()
    {
        return $this->belongsTo(Illustrator::class);
    }

    /**
     * The illustrators that illustratated the book.
     */
    public function illustrators()
    {
        return $this->belongsToMany(Illustrator::class);
    }
}
