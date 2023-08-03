<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function stock()
    {
        return $this->hasMany('App\Models\Stock', 'product_id');
    }

    public function order()
    {
        return $this->hasMany('App\Models\Order', 'product_id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function format_harga()
    {
        $hasil_rupiah = "Rp " . number_format($this->harga,2,',','.');
        return $hasil_rupiah;
    }
}
