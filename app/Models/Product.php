<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = ['name', 'description', 'category', 'price', 'stock'];

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    public function stock()
    {
        return $this->hasMany(Stock::class);
    }
}
