<?php

namespace App\Services;
use App\Lane;
use Carbon\Carbon;
use Illuminate\Http\Request;


class LaneService
{
  public function show($id)
  {
    return Lane::find($id);
  }
  public function update(Lane  $lane)
  {
    $lane->name = request('name');
    $lane->updated_at = Carbon::now();
    $lane->save();
    return $lane;
  }

  public function store(Request $request)
  {
    $lane = Lane::create([
        'board_id' => request('board_id'),
        'name'     => request('name'),
        'user_id' => request('user_id'),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
    ]);
    return $lane;
  }
}
