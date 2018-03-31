<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Resources\LaneCollection;
use App\Resources\LaneResource;

class BoardResource extends JsonResource
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
             'id'    => $this->id,
             'lanes' => LaneResource::collection($this->lanes)
         ];
     }
}
