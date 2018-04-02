<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Http\Resources\TaskResource;
use Carbon\Carbon;


class TaskController extends Controller
{
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
    $this->validate($request, [
        'lane_id' => 'required|exists:lanes,id',
        'name'    => 'required|string'
    ]);
    // static model method?
    // $max_order_key = DB::table('tasks')
    //                     ->where('lane_id', request('lane_id'))
    //                     ->max('order_key');
    $task = Task::create([
        'lane_id'   => request('lane_id'),
        'name'      => request('name'),
        'user_id' => request('user_id'),
        'board_id' => request('board_id'),
        'description' => ' desc ',
        'assigned_to' => request('assigned_to'),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
    ]);
    return new TaskResource($task);
}
/**
 * Display the specified resource.
 *
 * @param  \App\Task  $task
 * @return \Illuminate\Http\Response
 */
public function show($id)
{
  $task = Task::find($id);
  if (request()->wantsJson()) {
      return new TaskResource($task);
     // return view('board', compact('board'));

  }
  return new TaskResource($task);
}
/**
 * Show the form for editing the specified resource.
 *
 * @param  \App\Task  $task
 * @return \Illuminate\Http\Response
 */
public function edit(Task $task)
{
    //
}
/**
 * Update the specified resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  \App\Task  $task
 * @return \Illuminate\Http\Response
 */
public function update(Request $request, Task $task)
{
  $this->validate(request(), [
      'id' => 'required',
      'name' => 'required'
  ]);
  $task->name = request('name');
  $task->description = " desc ";
  $task->assigned_to = request('assigned_to');
  // if (  $task->assigned_to == null) {
  //   # code...
  //   $task->assigned_to = Auth::user()->id;
  // }
  $task->save();
  return new TaskResource($task);
}
/**
 * Remove the specified resource from storage.
 *
 * @param  \App\Task  $task
 * @return \Illuminate\Http\Response
 */
public function destroy($id)
{
  $task = Task::find($id);
  $task->delete();
}
public function updateOrder(Request $request)
{
    $tasks = collect(request('items'));
    // Loop over each task and update order_key column to be the array
    // index from the posted data
    $tasks->each(function($task_data, $key) {
        $task = Task::find($task_data['id']);
        // Validate task belongs to us
        if (auth()->id() != $task->lane->board->user_id) {
            return;
        }
        // Update order_key and save
        $task->order_key = $key;
        $task->save();
    });
    return response()->json(['data' => ['success' => true]]);
}
}
