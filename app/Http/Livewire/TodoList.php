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

    public function render()
    {
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

    public function clearInputs()
    {
        $this->task = null;
    }
}
