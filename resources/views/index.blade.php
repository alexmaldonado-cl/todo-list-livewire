<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo List - Laravel - Livewire - MySQL</title>

    <meta name="description" content="Gestión de tareas recurrentes - Proyecto desarrollado con tecnologías: HTML, Tailwind, Livewire(JS), Laravel 8, Mysql.">

    @livewireStyles
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100">
    @livewire('todo-list')

    @livewireScripts
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
