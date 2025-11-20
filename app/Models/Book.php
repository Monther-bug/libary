<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    protected $fillable = [
        'type_id',
        'picture',
        'title',
        'author',
        'publisher',
        'quantity',
        'price',
    ];

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }
}
