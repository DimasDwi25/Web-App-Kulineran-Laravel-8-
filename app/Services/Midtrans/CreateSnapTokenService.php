<?php

namespace App\Services\Midtrans;

use Midtrans\Snap;
use App\Models\Order;
use App\Models\DetailOrder;


class CreateSnapTokenService extends Midtrans
{
	protected $order;

	public function __construct($order)
	{
		parent::__construct();

		$this->order = $order;
	}

	public function getSnapToken()
	{
		$params = [
			/**
			 * 'order_id' => id order unik yang akan digunakan sebagai "primary key" oleh Midtrans untuk
			 * 				 membedakan order satu dengan order lain. Key ini harus unik (tidak boleh ada duplikat).
			 * 'gross_amount' => merupakan total harga yang harus dibayar customer.
			 */
			'transaction_details' => [
				'order_id' =>  $this->order->invoice,
				'gross_amount' => $this->order->sub_total,
			],
            // 'item_details' => [
			// 	[
			// 		'id' => $this->order->detail_order->food->id, // primary key produk
			// 		'price' => $this->order->detail_order->food->price, // harga satuan produk
			// 		'quantity' => $this->order->detail_order->quantity, // kuantitas pembelian
			// 		'name' => $this->order->detail_order->food->name, // nama produk
			// 	],
			// ],
			// 'customer_details' => [
			// 	// Key `customer_details` dapat diisi dengan data customer yang melakukan order.
			// 	'first_name' => $this->order->users->name,
			// 	'email' => $this->order->users->email,
			// 	'phone' => $this->order->no_hp,
			// ]
		];

		$snapToken = Snap::getSnapToken($params);

		return $snapToken;
	}
}
