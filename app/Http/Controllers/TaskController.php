<?php

namespace App\Http\Controllers;

use App\Task;

class TaskController extends Controller
{
    public function complete(Task $task)
    {
        $task->complete();
    }
}
