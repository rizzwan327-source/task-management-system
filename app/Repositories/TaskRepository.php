<?php

namespace App\Repositories;

use App\Interfaces\TaskRepositoryInterface;
use App\Models\Task;

class TaskRepository implements TaskRepositoryInterface
{

    public function getAll()
    {
        return Task::where('user_id', auth()->id())

            ->when(request('search'), function ($query) {
                $query->where('title', 'like', '%' . request('search') . '%');
            })

            ->when(request('status'), function ($query) {
                $query->where('status', request('status'));
            })

            ->latest()

            ->paginate(5)

            ->withQueryString();
    }
    // public function getAll()
    // {
    //     return Task::where('user_id', auth()->id())
    //         ->latest()
    //         ->get();
    // }

    public function store(array $data)
    {
        return Task::create($data);
    }

    public function find($id)
    {
        return Task::where('user_id', auth()->id())
            ->findOrFail($id);
    }

    public function update($id, array $data)
    {
        $task = Task::where('user_id', auth()->id())
            ->findOrFail($id);

        $task->update($data);

        return $task;
    }

    public function delete($id)
    {
        $task = Task::where('user_id', auth()->id())
            ->findOrFail($id);

        return $task->delete();
    }

    public function dashboardStats()
    {
        return [

            'total' => Task::where('user_id', auth()->id())->count(),

            'pending' => Task::where('user_id', auth()->id())
                ->where('status', 'Pending')
                ->count(),

            'progress' => Task::where('user_id', auth()->id())
                ->where('status', 'In Progress')
                ->count(),

            'completed' => Task::where('user_id', auth()->id())
                ->where('status', 'Completed')
                ->count(),

        ];
    }
}
