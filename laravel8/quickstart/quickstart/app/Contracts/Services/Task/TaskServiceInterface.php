<?php

namespace App\Contracts\Services\Task;

use App\Models\Task;
use Illuminate\Http\Request;

/**
 * Interface for task service
 */
interface TaskServiceInterface
{
    /**
     * To get task list
     * @return $taskList
     */
    public function getTaskList();

    /**
     * To save task
     * @param Request $request request with inputs
     * @return Object $task saved task
     */
    public function saveTask(Request $request);

    /**
     * To delete task
     * @param Task  $task
     * @return string $message message success or not
     */
    public function deleteTask(Task $task);
}