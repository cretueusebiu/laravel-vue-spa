<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
      return [
        'id'          => $this->id,
        'item_name'   => $this->item_name,
        'category'    => $this->category,
        'item_type'   => $this->item_type == 1 ? 'Non-Stocked' : 'Stock',
        'created_at'  => $this->created_at ? $this->created_at->format('d/m/Y H:i') : '',
      ];
    }
}
