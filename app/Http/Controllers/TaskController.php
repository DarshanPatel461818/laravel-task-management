<?php

namespace App\Http\Controllers;

use App\Exports\TaskExport;
use App\Http\Requests\TaskStorePostRequest;
use App\Imports\TaskImport;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class TaskController extends Controller
{
    public function index(Request $request)
    {

        $assignees = explode(',', env('ASSIGNEES'));
        $statuses = explode(',', env('STATUSES'));
        $priorities = explode(',', env('PRIORITIES'));

        if ($request->ajax()) {
            $data = Task::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->make(true);
        }

        $title = "Task Management";
        return view('task.index', compact('title','assignees','priorities','statuses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskStorePostRequest $request)
    {
        try {

            $imagePath = $request->hasFile('image') ? uploadSingleImage($request->file('image'), 'uploads/task') : null;

            Task::create([
                'title' => $request->title,
                'image' => $imagePath,
                'status' => $request->status,
                'priority' => $request->priority,
                'description' => $request->description,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'assignee' => $request->assignee,
            ]);

            return response()->json(['message' => 'Task Created Successfully'], 201);

        } catch (\Exception $e) {
            Log::error('Error creating task: ' . $e->getMessage());
            return response()->json(['message' => 'Something Went Wrong'], 500);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return response()->json($task);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskStorePostRequest $request, Task $task)
    {
        try {

            $imagePath = $request->hasFile('image') ? uploadSingleImage($request->file('image'), 'uploads/task') : $request->existingImage;

            $task->update([
                'title' => $request->title,
                'image' => $imagePath,
                'status' => $request->status,
                'priority' => $request->priority,
                'description' => $request->description,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'assignee' => $request->assignee,
            ]);

            return response()->json(['message' => 'Task Updated Successfully', 'task' => $task], 200);

        } catch (\Exception $e) {
            Log::error('Error updating task: ' . $e->getMessage());
            return response()->json(['message' => 'Something Went Wrong'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        try {
            $task->delete();

            return response()->json(['message' => 'Task deleted successfully.']);

        } catch (\Exception $e) {
            Log::error('Error deleting task: ' . $e->getMessage());
            return response()->json(['error' => 'An error occurred while deleting the task.'], 500);
        }
    }

    public function massDelete(Request $request)
    {
        try {
            Task::whereIn('id', $request->ids)->delete();
            return response()->json(['message' => 'Selected tasks deleted successfully.']);
        } catch (\Exception $e) {
            Log::error('Error deleting tasks: ' . $e->getMessage());
            return response()->json(['error' => 'An error occurred while deleting tasks.'], 500);
        }
    }

    public function export()
    {
        try{
            return Excel::download(new TaskExport, 'tasks.xlsx');
        } catch (\Exception $e) {
            Log::error('Error deleting tasks: ' . $e->getMessage());
        }
    }

    public function import(Request $request)
    {

        try{
            Excel::import(new TaskImport, $request->file('file'));
            return redirect()->back();
        } catch (\Exception $e) {
            Log::error('Error deleting tasks: ' . $e->getMessage());
        }
    }
}
