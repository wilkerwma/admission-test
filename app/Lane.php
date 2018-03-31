<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lane extends Model
{
      /**
       * Get tasks that are in the lane.
       */
      public function tasks()
      {
        return $this->hasMany('App\Task');
      }

      public function taskboard()
      {
          return $this->belongsTo('App\Board');
      }

      protected $fillable = [
          'name', 'created_by', 'tasks_board_id'
      ];

}
