<?php

namespace App\Http\Controllers;
use App\Lane;
use App\Http\Resources\LaneResource;
use App\Services\LaneService;



use Illuminate\Http\Request;

class LaneController extends Controller
{
  public function __construct(LaneService $laneService)
  {
    $this->middleware('auth');
    $this->service = $laneService;
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

   $lane = $this->service->store($request);

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

  $lane = $this->service->show($id);

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
  ]);
  $lane = $this->service->update($lane);

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
