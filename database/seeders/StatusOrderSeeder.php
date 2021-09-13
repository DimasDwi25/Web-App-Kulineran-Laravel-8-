<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StatusOrder;

class StatusOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            ['name' => 'Belum Bayar'],
            ['name' => 'Perlu Di Cek'],
            ['name' => 'Telah Di Bayar'],
            ['name' => 'Barang Di Kirim'],
            ['name' => 'Barang Telah Sampai'],
            ['name' => 'Pesanan Di Batalkan'],
        ];
        StatusOrder::insert($data);
    }
}
