<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
//        return parent::toArray($request);
        return [
            'id'=>$this->id,
            'ProductName'=>$this->name,
            'ProductDesc'=>$this->deskripsi,
            'Productprice'=>$this->harga_produk,
            'Stock'=>$this->stock,
        ];
    }
}
