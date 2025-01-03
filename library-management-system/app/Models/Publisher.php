<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasMany;

class Publisher extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'address',
    ];

    public function books(): hasMany
    {
        return $this->hasMany(Book::class);
    }

    public function reviews()
    {
        return $this->morphMany(Review::class, 'reviewable_type');
    }

}
