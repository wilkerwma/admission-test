<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelsLane extends Model
{
      /**
       * Get tasks that are in the lane.
       */
      public function tasks()
      {
        return $this->hasMany('App\Models\Task');
      }

      public function taskboard()
      {
          return $this->belongsTo('App\Models\TasksBoard');
      }

      protected $fillable = [
          'name', 'created_by', 'tasks_board_id'
      ];

}
