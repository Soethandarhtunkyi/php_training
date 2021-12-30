<?php

namespace App\Contracts\Dao\Task;

use Illuminate\Http\Request;
use App\Models\Task;

/**
 * Interface for Data Accessing Object of task
 */
interface TaskDaoInterface
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
     * @param Task $task
     * @return string $message message success or not
     */
    public function deleteTask(Task $task);
}
?>