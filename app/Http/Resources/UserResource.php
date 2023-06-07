<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        return [
                'id' => $this->id,
                'Nama'=>$this->name,
                'Alamat_Email'=>$this->email,
                'Role'=>$this->current_team_id,
                'Tanggal_Register'=>$this->created_at,
                'Tanggal_Update'=>$this->updated_at,
        ];
    }
}
