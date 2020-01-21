<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\Market\ProductsForCategoryResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'status' => $this->status,
            'email' => $this->email,
            'name' => $this->name,
            'surname' => $this->surname,
            'country' => $this->country,
            'city' => $this->city,
            'street' => $this->street,
            'items' => ProductsForCategoryResource::collection($this->items)
        ];
    }
}
