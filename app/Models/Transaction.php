<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';

    protected $fillable = ['type', 'product_id', 'quantity', 'transaction_date'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
