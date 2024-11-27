<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    /**
     * Display a listing of tasks
     */
    public function index()
    {
        $tasks = Task::all();
        return response()->json($tasks);
    }

    /**
     * Store a newly created task
     */
    public function store(Request $request)
    {
        // Add debugging to see incoming request
        \Log::info('Incoming POST request data:', $request->all());

        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'description' => 'nullable|string',
            'status' => 'nullable|in:pending,in_progress,completed',
            'priority' => 'nullable|in:low,medium,high',
            'due_date' => 'nullable|date'
        ]);

        if ($validator->fails()) {
            // Log validation errors
            \Log::error('Validation errors:', $validator->errors()->toArray());

            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $task = Task::create($request->all());
            return response()->json($task, 201);
        } catch (\Exception $e) {
            // Log any creation errors
            \Log::error('Task creation error: ' . $e->getMessage());
            return response()->json([
                'error' => 'Failed to create task',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display a specific task
     */
    public function show($id)
    {
        $task = Task::findOrFail($id);
        return response()->json($task);
    }

    /**
     * Update a specific task
     */
    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'title' => 'sometimes|required|max:255',
            'description' => 'nullable|string',
            'status' => 'in:pending,in_progress,completed',
            'due_date' => 'nullable|date',
            'priority' => 'in:low,medium,high'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        $task->update($validator->validated());

        return response()->json($task);
    }

    /**
     * Delete a specific task
     */
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return response()->json(null, 204);
    }
}