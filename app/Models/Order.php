<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'order';
    protected $fillable = [
        'invoice', 'users_id', 'sub_total', 'no_resi', 'status_order_id', 'metode_pembayaran', 'pesan', 'no_hp', 'bukti_pembayaran', 'biaya_cod', 'ongkir'
    ];

    public function status_order()
    {
        return $this->belongsTo(StatusOrder::class, 'status_order_id', 'id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

}
