<?php

namespace App\Http\Controllers;
use App\Lane;
use App\Http\Resources\LaneResource;
use Carbon\Carbon;



use Illuminate\Http\Request;

class LaneController extends Controller
{
  public function __construct()
{
  $this->middleware('auth');
}
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index()
{
  //
}
/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
public function create()
{
  //
}
/**
* Store a newly created resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/
public function store(Request $request)
{
  $this->validate(request(), [
      'board_id' => 'required|exists:boards,id',
      'name'     => 'required'
      ]);
  $lane = Lane::create([
      'board_id' => request('board_id'),
      'name'     => request('name'),
      'user_id' => request('user_id'),
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now()
  ]);
  return new LaneResource($lane);
}
/**
* Display the specified resource.
*
* @param  \App\Lane  $lane
* @return \Illuminate\Http\Response
*/
public function show($id)
{
  // if (auth()->id() != $lane->board->user_id) {
  //     return response(null, 404);
  // }

  $lane = Lane::find($id);
  if (request()->wantsJson()) {
      return new LaneResource($lane);
     // return view('board', compact('board'));

  }
  return new LaneResource($lane);
}
/**
* Show the form for editing the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function edit($id)
{
  //
}
/**
* Update the specified resource in storage.
*
* @param  \App\Lane  $lane
* @return \Illuminate\Http\Response
*/
public function update(Lane $lane)
{
  $this->validate(request(), [
      'id' => 'required',
      'name' => 'required',
      'updated_at' => 'required'
  ]);
  $lane->name = request('name');
  $lane->updated_at = Carbon::now();
  $lane->save();
  return new LaneResource($lane);
}
/**
* Remove the specified resource from storage.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function destroy($id)
{
  //
}
}
