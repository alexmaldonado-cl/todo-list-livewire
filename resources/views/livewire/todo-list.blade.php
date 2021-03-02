<div>
    <nav class=" bg-gray-300 w-full flex relative justify-between items-center mx-auto px-8 h-20">
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
              <a class="inline-block py-2 px-3 hover:bg-gray-200 rounded-full" href="#">
                <div class="flex items-center relative cursor-pointer whitespace-nowrap">Portfolio</div>
              </a>
              <div class="block relative">
                <button type="button" class="inline-block py-2 px-3 hover:bg-gray-200 rounded-full relative ">
                  <div class="flex items-center h-5">
                    <div class="_xpkakx">
                      <svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="presentation" focusable="false" style="display: block; height: 16px; width: 16px; fill: currentcolor;"><path d="m8.002.25a7.77 7.77 0 0 1 7.748 7.776 7.75 7.75 0 0 1 -7.521 7.72l-.246.004a7.75 7.75 0 0 1 -7.73-7.513l-.003-.245a7.75 7.75 0 0 1 7.752-7.742zm1.949 8.5h-3.903c.155 2.897 1.176 5.343 1.886 5.493l.068.007c.68-.002 1.72-2.365 1.932-5.23zm4.255 0h-2.752c-.091 1.96-.53 3.783-1.188 5.076a6.257 6.257 0 0 0 3.905-4.829zm-9.661 0h-2.75a6.257 6.257 0 0 0 3.934 5.075c-.615-1.208-1.036-2.875-1.162-4.686l-.022-.39zm1.188-6.576-.115.046a6.257 6.257 0 0 0 -3.823 5.03h2.75c.085-1.83.471-3.54 1.059-4.81zm2.262-.424c-.702.002-1.784 2.512-1.947 5.5h3.904c-.156-2.903-1.178-5.343-1.892-5.494l-.065-.007zm2.28.432.023.05c.643 1.288 1.069 3.084 1.157 5.018h2.748a6.275 6.275 0 0 0 -3.929-5.068z"></path></svg>
                    </div>
                  </div>
                </button>
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

        @foreach ($todoListIncomplete as $todo)
        <div class="h-100 my-1 px-4 w-full flex items-center justify-center font-sans">
            <div class="bg-gray-800 rounded-lg shadow py-4 px-4 w-full lg:w-3/4 lg:max-w-3xl">
                <div>
                    <div class="flex items-center">

                        <input class="rounded-2xl bg-blue-600 h-6 w-6 mr-4" type="checkbox" name="completed-{{$todo->id}}" id="completed-{{$todo->id}}" wire:click="changeStatus({{$todo->id}})">

                        <p class="w-full text-white {{ $todo->completed == 1 ? 'line-through' : '' }} ">{{$todo->task}}</p>

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
                            <input class="rounded-2xl {{ $todo->completed == 1 ? 'completed' : '' }} bg-blue-600 h-6 w-6 mr-4" type="checkbox" name="completed" {{ $todo->completed == 1 ? 'checked' : '' }} id="completed" wire:click="changeStatus({{$todo->id}})">
                            <p class="w-full text-white {{ $todo->completed == 1 ? 'line-through' : '' }} ">{{$todo->task}}</p>


                            <button
                            wire:click="delete({{$todo->id}})"
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
