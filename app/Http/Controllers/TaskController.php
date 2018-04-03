<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Task;
use App\Http\Resources\TaskResource;
use App\Services\TaskService;



class TaskController extends Controller
{

  public function __construct(TaskService $taskService)
  {
    $this->middleware('auth');
    $this->service = $taskService;
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
    $this->validate($request, [
        'lane_id' => 'required|exists:lanes,id',
        'name'    => 'required|string'
    ]);

    $task = $this->service->store($request);
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
  $task = $this->service->show($id);

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

  $task = $this->service->update($request, $task);
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
  $this->service->destroy($id);
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
