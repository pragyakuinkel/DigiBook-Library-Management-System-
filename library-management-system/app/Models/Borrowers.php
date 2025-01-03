<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Borrowers extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id',
        'user_id',
        'borrowed_at',
        'returned_at',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
