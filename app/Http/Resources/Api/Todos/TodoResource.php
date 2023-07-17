<?php

namespace App\Http\Resources\Api\Todos;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\JsonResource;

class TodoResource extends JsonResource
{
    public function toArray($request): array|\JsonSerializable|Arrayable
    {
        return [
            'id' => $this->_id,
            'description' => $this->description,
            'tags' => $this->tags,
            'created_at' => $this->created_at->format('H:i:s d/m/Y'),
        ];
    }
}
