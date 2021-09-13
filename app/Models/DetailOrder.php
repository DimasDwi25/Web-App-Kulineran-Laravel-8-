<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailOrder extends Model
{
    use HasFactory;

    protected $table = 'details_order';
    protected $fillable = [
        'order_id', 'food_id', 'quantity'
    ];

}
