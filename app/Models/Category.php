<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['classification_id', 'name'];

    public function classification(): BelongsTo
    {
        return $this->belongsTo(Classification::class,"classification_id","id");
    }

    public function types(): HasMany
    {
        return $this->hasMany(Type::class ,"category_id","id");
    }
}
