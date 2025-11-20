<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillable = ['classification_id', 'name'];

    public function classification(): BelongsTo
    {
        return $this->belongsTo(Classification::class);
    }

    public function types(): HasMany
    {
        return $this->hasMany(Type::class);
    }
}
