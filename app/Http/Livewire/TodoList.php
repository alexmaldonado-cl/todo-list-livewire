<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\TodoList as TodoModel;

class TodoList extends Component
{

    public $task;

    protected $rules = [
        'task' => 'required'
    ];

    protected $messages = [
        'task.required' => 'Debe ingresar una tarea'
    ];

    public $listeners                   = [
        'destroy'                          => 'delete',
    ];


    public function render()
    {
        $todoListIncomplete = TodoModel::where('completed', 0)->orderBy('created_at', 'desc')->get();
        $todoListCompleted = TodoModel::where('completed', 1)->get();
        return view('livewire.todo-list', [
            'todoListIncomplete' => $todoListIncomplete,
            'todoListCompleted'  => $todoListCompleted,
        ]);
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
        $task = TodoModel::find($task_id);
        if (!$task) return;
        $task->completed = !$task->completed;
        $task->save();
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
