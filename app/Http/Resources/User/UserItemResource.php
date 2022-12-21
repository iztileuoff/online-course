<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;

class UserItemResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'user_id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
        ];
    }
}
