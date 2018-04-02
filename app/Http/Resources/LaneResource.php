<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LaneResource extends JsonResource
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
        'name'  => $this->name,
        'user_id' => $this->user_id,
        'board_id' => $this->board_id,
        'tasks' => $this->tasks
      ];
    }
}
