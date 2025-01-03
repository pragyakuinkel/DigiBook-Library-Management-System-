<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Authors extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email'
    ];

    public function books(): BelongsToMany
    {
        return $this->belongsToMany(Book::class,'book_authors', 'book_id', 'author_id')
        ->withTimestamps();
    }

    public function reviews()
    {
        return $this->morphMany(Review::class, 'reviewable_type');
    }

}
