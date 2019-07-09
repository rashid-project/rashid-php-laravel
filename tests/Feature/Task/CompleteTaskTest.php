<?php

namespace Tests\Feature\Task;

use App\User;
use App\Task;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CompleteTaskTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_complete_a_task()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();

        $task = factory(Task::class)->create([
            'is_complete' => false,
        ]);

        $this->assertFalse($task->isComplete());

        $response = $this->post(route('task.complete', ['task_id' => $task->id]));

        $response->assertSuccessful();

        $this->assertTrue($task->fresh()->isComplete());
    }
}
