<div>
    <nav class="bg-gray-800 text-white w-full flex relative justify-between items-center mx-auto px-8 h-20">
        <!-- logo -->
        <div class="inline-flex">
            <a class="_o6689fn text-3xl font-bold" href="/">
                TODO LIST
            </a>
        </div>

        <!-- end logo -->



        <!-- login -->
        <div class="flex-initial">
          <div class="flex justify-end items-center relative">

            <div class="flex mr-4 items-center">
              <a class="inline-block font-bold py-2 px-3 hover:bg-yellow-400 rounded-full hover:text-black" href="https://www.cisnedigital.cl/portafolio" target="_blank" title="Visitar Portafolio">
                <div class="flex items-center relative cursor-pointer whitespace-nowrap">Portfolio</div>
              </a>
              <div class="block relative">
                  <a href="https://github.com/alexmaldonado-cl/todo-list-livewire" title="Ver proyecto en GitHub" target="_blank">
                    <button type="button" class="inline-block py-2 px-3 hover:bg-yellow-400 rounded-full relative">
                        <div class="flex items-center h-5">
                          <div class="_xpkakx">
                              <svg width="24" height="24" fill="currentColor" class="text-white hover:text-black"><path fill-rule="evenodd" clip-rule="evenodd" d="M12 2C6.477 2 2 6.463 2 11.97c0 4.404 2.865 8.14 6.839 9.458.5.092.682-.216.682-.48 0-.236-.008-.864-.013-1.695-2.782.602-3.369-1.337-3.369-1.337-.454-1.151-1.11-1.458-1.11-1.458-.908-.618.069-.606.069-.606 1.003.07 1.531 1.027 1.531 1.027.892 1.524 2.341 1.084 2.91.828.092-.643.35-1.083.636-1.332-2.22-.251-4.555-1.107-4.555-4.927 0-1.088.39-1.979 1.029-2.675-.103-.252-.446-1.266.098-2.638 0 0 .84-.268 2.75 1.022A9.606 9.606 0 0112 6.82c.85.004 1.705.114 2.504.336 1.909-1.29 2.747-1.022 2.747-1.022.546 1.372.202 2.386.1 2.638.64.696 1.028 1.587 1.028 2.675 0 3.83-2.339 4.673-4.566 4.92.359.307.678.915.678 1.846 0 1.332-.012 2.407-.012 2.734 0 .267.18.577.688.48C19.137 20.107 22 16.373 22 11.969 22 6.463 17.522 2 12 2z"></path></svg>
                          </div>
                        </div>
                      </button>
                  </a>
              </div>
            </div>


          </div>
        </div>
        <!-- end login -->
    </nav>





    <div class="h-100 mt-4 w-full flex items-center justify-center font-sans">
        <div class="bg-gray-800 rounded-2xl shadow p-6 m-4 w-full lg:w-3/4 lg:max-w-3xl">
            <div class="mb-4">
                <div class="flex mt-4">
                    <div class="w-full p-1 mr-4">
                        <input class="shadow appearance-none border rounded-full w-full py-2 px-3 mr-4 text-grey-darker focus:outline-none" placeholder="Agregar una tarea" wire:model="task">

                        @error('task')
                        <div class="text-center">
                            <span class="text-red-500">{{$message}}</span>
                        </div>
                        @enderror

                    </div>

                    <button
                    wire:click="store()"
                    class="uppercase p-3 flex items-center p-0 w-12 h-12 max-w-max bg-yellow-400 rounded-full hover:bg-yellow-500 active:shadow-lg mouse shadow transition ease-in duration-300 focus:outline-none">
                        <svg viewBox="0 0 20 20" enable-background="new 0 0 20 20" class="w-6 h-6 inline-block">
                            <path fill="#FFFFFF" d="M16,10c0,0.553-0.048,1-0.601,1H11v4.399C11,15.951,10.553,16,10,16c-0.553,0-1-0.049-1-0.601V11H4.601
                                                    C4.049,11,4,10.553,4,10c0-0.553,0.049-1,0.601-1H9V4.601C9,4.048,9.447,4,10,4c0.553,0,1,0.048,1,0.601V9h4.399
                                                    C15.952,9,16,9.447,16,10z" />
                        </svg>
                    </button>

                </div>

            </div>
        </div>
    </div>

    <div>

        @foreach ($todoListIncomplete as $todoIncomplete)
        <div class="h-100 my-1 px-4 w-full flex items-center justify-center font-sans">
            <div class="bg-gray-800 rounded-lg shadow py-4 px-4 w-full lg:w-3/4 lg:max-w-3xl">
                <div>
                    <div class="flex items-center">

                        <input class="rounded-2xl bg-blue-600 h-6 w-6 mr-4" type="checkbox" name="completed-{{$todoIncomplete->id}}" id="completed-{{$todoIncomplete->id}}" wire:click="changeStatus({{$todoIncomplete->id}})">

                        <p class="w-full text-white {{ $todoIncomplete->completed == 1 ? 'line-through' : '' }} ">{{$todoIncomplete->task}}</p>

                        <button
                        wire:click="$emit('triggerDelete',{{ $todoIncomplete->id }})"
                        class="uppercase p-2 flex items-center w-8 h-8 max-w-max bg-gray-400 rounded-full hover:bg-red-500 active:shadow-lg mouse shadow transition ease-in duration-300 focus:outline-none" title="Eliminar">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6 inline-block">
                            <path fill="#FFFFFF" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                          </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>


    @if (count($todoListCompleted))
    <div x-data={show:false}>
        <div class="h-100 my-1 px-4 w-full flex items-center justify-center font-sans">
            <p class="flex">
                <a x-on:click.prevent="show=!show" class="mt-6 bg-gray-500 text-gray-200 rounded hover:bg-gray-700 px-4 py-1 cursor-pointer focus:outline-none mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6 inline-block">
                        <path x-show="!show" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        <path x-show="show" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>

                    Completados ({{count($todoListCompleted)}})

                </a>
            </p>
        </div>

        <div x-show="show" >

            @foreach ($todoListCompleted as $todo)
            <div class="h-100 my-1 px-4 w-full flex items-center justify-center font-sans">
                <div class="bg-gray-800 rounded-lg shadow py-4 px-4 w-full lg:w-3/4 lg:max-w-3xl">
                    <div>
                        <div class="flex items-center">

                            <input class="rounded-2xl completed bg-blue-600 h-6 w-6 mr-4" checked type="checkbox" wire:click="changeStatus({{$todo->id}})">
                            <p class="w-full text-white line-through">{{$todo->task}}</p>


                            <button
                            wire:click="$emit('triggerDelete',{{ $todo->id }})"
                            class="uppercase p-2 flex items-center w-8 h-8 max-w-max bg-gray-400 rounded-full hover:bg-red-500 active:shadow-lg mouse shadow transition ease-in duration-300 focus:outline-none" title="Eliminar">
                              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6 inline-block">
                                <path fill="#FFFFFF" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                              </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>




    </div>
    @endif
</div>
