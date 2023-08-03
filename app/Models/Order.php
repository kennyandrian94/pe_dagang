<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id');
    }

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer', 'customer_id');
    }

    public function stock()
    {
        return $this->belongsTo('App\Models\Stock', 'stock_id');
    }

    public function format_harga()
    {
        $angka = $this->quantity * $this->product->harga;

        $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
        return $hasil_rupiah;
    }
}
