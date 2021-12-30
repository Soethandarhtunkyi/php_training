<?php

namespace App\Services\Task;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Contracts\Dao\Task\TaskDaoInterface;
use App\Contracts\Services\Task\TaskServiceInterface;

/**
 * Service class for task.
 */
class TaskService implements TaskServiceInterface
{
    /**
     * task dao
     */
    private $taskDao;

    /**
     * Class Constructor
     * @param TaskDaoInterface
     * @return
     */
    public function __construct(TaskDaoInterface $taskDao)
    {
        $this->taskDao = $taskDao;
    }

    /**
     * To get task list
     * @return array $postList Task list
     */
    public function getTaskList()
    {
        return $this->taskDao->getTaskList();
    }

    /**
     * To save task
     * @param Request $request request with inputs
     * @return Object $task saved task
     */
    public function saveTask(Request $request)
    {
        return $this->taskDao->saveTask($request);
    }

    /**
     * To delete task
     * @param Task  $task
     * @return string $message message success or not
     */
    public function deleteTask(Task $task)
    {
        return $this->taskDao->deleteTask($task);
    }
}