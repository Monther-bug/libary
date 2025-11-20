<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Type extends Model
{
    protected $fillable = ['category_id', 'name', 'edition'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function books(): HasMany
    {
        return $this->hasMany(Book::class);
    }
}
