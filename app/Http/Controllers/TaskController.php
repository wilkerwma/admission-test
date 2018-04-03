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
public function update(Task $task)
{
  $this->validate(request(), [
      'id' => 'required',
      'name' => 'required'
  ]);

  $task = $this->service->update($task);
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
  return response()->json(['data' => ['success' => true]]);
}

public function changeLane(Request $request)
{
    $tasks = collect(request('tasks'));
    $tasks->each(function($task_data, $key) {
        $task = $this->service->show($task_data['id']);
        if ($task->lane_id != request('lane_id')) {
          $task->lane_id = request('lane_id');
          $task = $this->service->updateLane($task, (int)request('lane_id'));
        }
    });
    return response()->json(['data' => ['success' => true]]);
}
}
