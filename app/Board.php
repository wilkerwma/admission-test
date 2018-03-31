<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Lane;

class Board extends Model
{


  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  public $fillable = [
      'id', 'created_at', 'updated_at', 'lanes'
  ];
    /**
   * Get the tasks for the taskboard.
   */
    // public function tasks()
    // {
    //     return $this->hasMany('App\Task');
    // }
    // //
    // public function lanes()
    // {
    //     return $this->hasMany('App\Lane');
    // }

    public function lanes()
    {
        return $this->hasMany(Lane::class);
    }
}
