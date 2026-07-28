<?php

namespace App\Http\Controllers;

use App\Services\TaskService;

class DashboardController extends Controller
{
    protected $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function index()
    {
        $stats = $this->taskService->dashboardStats();

        return view('dashboard', compact('stats'));
    }
}
