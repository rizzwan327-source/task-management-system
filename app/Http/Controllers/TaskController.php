<?php

namespace App\Http\Controllers;

use App\Services\TaskService;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    protected $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = $this->taskService->getAllTasks();

        return view('tasks.index', compact('tasks'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:Pending,In Progress,Completed',
            'due_date' => 'required|date',
        ]);

        $this->taskService->createTask($validated);

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Task Created Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $task = $this->taskService->getTaskById($id);

        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $task = $this->taskService->getTaskById($id);

        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:Pending,In Progress,Completed',
            'due_date' => 'required|date',
        ]);

        $this->taskService->updateTask($id, $validated);

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Task Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->taskService->deleteTask($id);

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Task Deleted Successfully.');
    }
}
