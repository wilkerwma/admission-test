<?php

namespace App\Http\Controllers;

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
      'tasks_boards_id' => 'required|exists:boards,id',
      'name'     => 'required'
  ]);
  $lane = Lane::create([
      'tasks_boards_id' => request('board_id'),
      'name'     => request('name')
  ]);
  return new LaneResource($lane);
}
/**
* Display the specified resource.
*
* @param  \App\Lane  $lane
* @return \Illuminate\Http\Response
*/
public function show(Lane $lane)
{
  // if (auth()->id() != $lane->board->user_id) {
  //     return response(null, 404);
  // }
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
      'name' => 'required'
  ]);
  $lane->name = request('name');
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
