<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\User;
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
             'board_id' => $this->board_id,
             'name'      => $this->name,
             'description'  => $this->description,
             'assigned_to'  => $this->assigned_to,
             'user_name' => User::find($this->assigned_to)->name
         ];
     }
}
