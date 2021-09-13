<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $table= 'foods';
    protected $fillable = [
        'name', 'gambar', 'description', 'price', 'categories_id'
    ];

    public function categories()
    {
        return $this->BelongsTo(Categorie::class, 'categories_id', 'id');
    }

    public function getPhotoAttribute($value)
    {
        return url('storage/' . $value);
    }
}
