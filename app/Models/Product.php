<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';

    protected $fillable = ['name', 'deskripsi', 'id_kategori', 'harga_produk', 'stock' , 'supplier_id' ,'created_by'];

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    public function stock()
    {
        return $this->hasMany(Stock::class);
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
