<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
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
             'id'        => $this->id,
             'lane_id'   => $this->lane_id,
             'name'      => $this->name,
             'description'  => $this->description,
             'assigned_to'  => $this->assigned_to,
         ];
     }
}
