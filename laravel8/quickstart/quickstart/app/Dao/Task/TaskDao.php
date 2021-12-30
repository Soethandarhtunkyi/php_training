<?php

namespace App\Dao\Task;

use App\Contracts\Dao\Task\TaskDaoInterface;
use Illuminate\Http\Request;
use App\Models\Task;

/**
 * Interface for Data Accessing Object of task
 */
class TaskDao implements TaskDaoInterface
{
    /**
     * To get task list
     * @return $taskList
     */
    public function getTaskList()
    {
        return Task::orderBy('created_at', 'asc')->get();
    }

    /**
     * To save task
     * @param Request $request request with inputs
     * @return Object $task saved task
     */
    public function saveTask(Request $request)
    {
        $task = new Task;
        $task->name = $request->name;
        $task->save();

        return $task;
    }

    /**
     * To delete task
     * @param Task  $task
     * @return string $message message success or not
     */
    public function deleteTask(Task $task)
    {
        return $task->delete();
    }
}