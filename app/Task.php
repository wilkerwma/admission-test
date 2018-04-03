<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
      /**
       * Get thelane that the task is.
       */
      public function lane()
      {
          return $this->belongsTo('App\Models\Lane');
      }

      /**
       * Get thelane that the task is.
       */
      public function taskboard()
      {
          return $this->belongsTo('App\Models\TasksBoard');
      }

      /**
       * The attributes that are mass assignable.
       *
       * @var array
       */
      protected $fillable = [
          'name', 'user_id', 'lane_id', 'assigned_to', 'description', 'board_id'
      ];


}
