<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Illustrator extends Model
{
    use HasFactory;
        
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'shortbio',
        'longbio',
        'image',
        'website',
        'email',
        'slug',
    ];

    /**
     * Get the books for the Illustrator.
     */
    public function books(): HasMany
    {
        return $this->hasMany(Book::class);
    }
}