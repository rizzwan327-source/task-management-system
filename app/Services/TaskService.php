<?php

namespace App\Services;

use App\Interfaces\TaskRepositoryInterface;

class TaskService
{
    protected $taskRepository;

    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function getAllTasks()
    {
        return $this->taskRepository->getAll();
    }

    public function createTask(array $data)
    {
        $data['user_id'] = auth()->id();

        return $this->taskRepository->store($data);
    }

    public function getTaskById($id)
    {
        return $this->taskRepository->find($id);
    }

    public function updateTask($id, array $data)
    {
        return $this->taskRepository->update($id, $data);
    }

    public function deleteTask($id)
    {
        return $this->taskRepository->delete($id);
    }
    public function dashboardStats()
    {
        return $this->taskRepository->dashboardStats();
    }
}
