<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\TodoList as TodoModel;

class TodoList extends Component
{

    public $task;
    public $todoListIncomplete;
    public $todoListCompleted;

    protected $rules = [
        'task' => 'required'
    ];

    protected $messages = [
        'task.required' => 'Debe ingresar una tarea'
    ];

    public $listeners                   = [
        'destroy'                          => 'delete',
    ];

    private function getTodoLists()
    {
        $this->todoListIncomplete = TodoModel::where('completed', 0)->orderBy('created_at', 'desc')->get();
        $this->todoListCompleted  = TodoModel::where('completed', 1)->get();
    }


    public function render()
    {
        $this->getTodoLists();
        return view('livewire.todo-list');
    }

    public function store()
    {
        $this->validate($this->rules, $this->messages);
        TodoModel::create([
            'task' => $this->task
        ]);
        $this->clearInputs();
    }

    public function changeStatus($task_id)
    {
        // dd($task_id);
        $task = TodoModel::find($task_id);
        if (!$task) return;
        $task->completed = $task->completed === 1 ? 0 : 1;
        $task->save();
        $this->getTodoLists();
    }

    public function delete($task_id)
    {
        $task = TodoModel::find($task_id);
        if (!$task) return;
        $task->delete();
    }

    public function clearInputs()
    {
        $this->task = null;
    }
}
