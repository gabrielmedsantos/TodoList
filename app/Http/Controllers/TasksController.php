<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use Illuminate\Http\Request;

class TasksController extends Controller
{
   //GET
    public function index()
    {
        try {
            $tasks = Tasks::all();
            return response()->json($tasks, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

//CREATE
    public function store(Request $request)
    {
        try {
            Tasks::create($request->all());
            return response()->json(['message' => 'Task created successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

//SHOW
    public function show(Tasks $tasks)
    {
        //
    }


//UPDATE
    public function update(Request $request, int $id)
    {
        try {
            $task = Tasks::findOrFail($id);
            $task->update($request->all());
            return response()->json(['message' => 'Task updated successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

//DELETE
    public function destroy($id)
    {
        try {
            $task = Tasks::findOrFail($id);
            $task->delete();
            return response()->json(['message' => 'Task deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
