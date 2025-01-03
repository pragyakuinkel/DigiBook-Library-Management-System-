<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';

    protected $fillable = [
        'name',
        'isbn',
        'publication',
        'publication_year',
        'availability',
        'available_copy',
        'image',
    ];

    public function authors(): BelongsToMany
    {
        return $this->belongsToMany(Authors::class,'book_authors', 'book_id', 'author_id')
        ->withTimestamps();
    }

    public function genres(): BelongsToMany
    {
        return $this->belongsToMany(Genre::class,'book_genres', 'book_id', 'genre_id')
        ->withTimestamps();
    }

    public function borrowers(): BelongsToMany
    {
        return $this->belongsToMany(Borrowers::class);
    }

    public function publisher(): BelongsTo
    {
        return $this->belongsTo(Publisher::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'borrowers', 'book_id', 'user_id')
                    ->withPivot('borrowed_at', 'returned_at');
    }

    public function reviews()
    {
        return $this->morphMany(Review::class, 'reviewable_type');
    }

}
