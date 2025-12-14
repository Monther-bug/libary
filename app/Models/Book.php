<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_id',
        'picture',
        'title',
        'author',
        'description',
        'publisher',
        'quantityStock',
        'price',
    ];

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class ,"type_id","id");
    }

    public function getImageUrlAttribute()
    {
        if ($this->picture) {
            if (str_starts_with($this->picture, 'http')) {
                return $this->picture;
            }
            return asset('storage/' . $this->picture);
        }
        return null; // Or return a default image URL
    }
}
