<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    /**
     * Scope a query to only include products of a given name.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $name
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected $fillable = ['name', 'description', 'price', 'category_id', 'slug', 'stock', 'image'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function scopeSearch($query, $name)
    {
        if ($name) {
            return $query->where('name', 'like', '%' . $name . '%');
        }

        return $query;
    }
}
