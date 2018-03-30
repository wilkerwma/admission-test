<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Board extends Model
{

    /**
   * Get the tasks for the taskboard.
   */
    public function tasks()
    {
        return $this->hasMany('App\Models\Task');
    }

    public function lanes()
    {
        return $this->hasMany('App\Models\Lanes')
        ->orderby('id', 'ASC');
    }
}
