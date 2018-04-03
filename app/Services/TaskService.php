<?php

namespace App\Services;
use App\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;


class TaskService
{
  public function show($id)
  {
    return Task::find($id);
  }
  public function update(Task $task)
  {
    $task->name = request('name');
    $task->description = " desc ";
    $task->assigned_to = request('assigned_to');
    $task->updated_at = Carbon::now();
    $task->save();
    return $task;
  }

  public function updateLane(Task $task, $id)
  {
    // $task->name = request('name');
    // $task->description = " desc ";
    // $task->assigned_to = request('assigned_to');
    // $task->updated_at = Carbon::now();
    $task->save();
    return $task;
  }

  public function store(Request $request)
  {
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
    return $task;
  }

  public function destroy($id)
  {
    $task = Task::find($id);
    $task->delete();
  }
}
