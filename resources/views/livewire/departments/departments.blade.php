<div>
    @can('отделы (чтение)')
    @if($isClosedEditor)

        @can('отделы (создание)')
            <div class="grid grid-cols-7 mb-5">
                <div class="col-span-1 colorA2">
                    <button wire:click='createDepartment()' class="flex items-center justify-center rounded-lg shadow-md hover:shadow-xl w-full btn bg-beige hover:bg-beige-dark text-gray-800">
                        <img src="{{asset('/icons/add.svg')}}" class='w-6 h-6 mr-2 bg-cover fill-white'>
                        <span class='ml-2'>Отдел</span>
                    </button>
                </div>
            </div>
        @endcan

        <div>
            <div class="grid grid-cols-5 mt-1 mb-1 space-x-0.5"> 
                <p class="col-span-1 h-7 borderA colorA2 text-center"> Id</p>
                <div class="col-span-4">
                        <div class="flex flex-row h-full space-x-0.5">

                            <div class="w-full borderA colorA2">
                                <p class='flex items-center justify-center h-7'>Название</p>
                            </div>
                            
                            <div class='flex space-x-0.5'>
                                <div class='flex items-center justify-center w-10 borderA colorA2'> 
                                </div>

                                @can('отделы (редактирование)')
                                    <div class='flex items-center justify-center w-10 colorA2'> 
                                    </div>
                                @endcan

                                @can('отделы (удаление)')
                                    <div class='flex items-center justify-center w-10 colorA2'> 
                                    </div>
                                @endcan
                            </div>
                        </div>
                    </div>
            </div>

            @foreach($departments as $department)
                <div class="grid grid-cols-5 mt-1 mb-1 space-x-0.5"> 

                        <div class="col-span-1 borderC">
                            <p class='flex items-center justify-center h-8'>{{$department->id}}</p>
                        </div>

                        <div class="col-span-4">
                            <div class="flex flex-row h-full space-x-0.5">
                                <div class="w-full col-span-3 borderC">
                                    <p class='flex items-center justify-center h-8'>{{$department->name}} </p>
                                </div>

                                <div class="space-x-0.5 flex">
                                    <button wire:key='read_departments_{{$department->id}}' wire:click="read({{$department->id}})" class='flex items-center justify-center w-10'>
                                        <img src="{{asset('/icons/info.svg')}}" class='w-8 h-8 bg-cover fill-white'>
                                    </button>
                                    @can('отделы (редактирование)')
                                        <button wire:key='edit_departments_{{$department->id}}' wire:click="edit({{$department->id}})" class='flex items-center justify-center w-10'>
                                            <img src="{{asset('/icons/edit.svg')}}" class='w-8 h-8 bg-cover fill-white'>
                                        </button>
                                    @endcan
                                    @can('отделы (удаление)')
                                        <button wire:key='del_departments_{{$department->id}}' wire:click="try2Delete({{$department->id}})" class='flex items-center justify-center w-10'>
                                            <img src="{{asset('/icons/cross.svg')}}" class='w-8 h-8 bg-cover fill-white'>
                                        </button>
                                    @endcan
                                </div>
                            </div>
                        </div>
                    
                </div>
            @endforeach
         </div>
    @endif

    <livewire:departments.edit-departments>
    <livewire:departments.read-departments>

    @can('отделы (удаление)')
        @if($del_id != 0)
            <div class="fixed top-0 left-0 flex items-center justify-center w-full h-full overflow-y-auto bg-gray-600 bg-opacity-50 insert-0">
                <div class="relative m-4 w-2/5 min-w-[40%] max-w-[40%] rounded-lg bg-white font-sans text-base font-light leading-relaxed text-blue-gray-500 antialiased shadow-2xl">
                    <div class="flex items-center p-4 font-sans text-2xl antialiased font-semibold leading-snug shrink-0 text-blue-gray-900">
                        Удаление отдела
                    </div>
                    <div class="relative p-4 font-sans text-base antialiased font-light leading-relaxed border-t border-b border-t-blue-gray-100 border-b-blue-gray-100 text-blue-gray-500">
                        Вы точно хотите удалить отдел? Это действие нельзя будет отменить!
                    </div>
                    <div class="flex flex-wrap items-center justify-end p-4 shrink-0 text-blue-gray-500">
                        <button wire:click.prevent='discardDelete()' class="px-6 py-3 mr-1 font-sans text-xs font-bold text-red-500 uppercase transition-all rounded-lg middle none center hover:bg-red-500/10 active:bg-red-500/30 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                            Нет
                        </button>
                        <button wire:click='acceptDelete()' class="px-6 py-3 mr-1 font-sans text-xs font-bold text-green-500 uppercase transition-all rounded-lg middle none center hover:bg-green-500/10 active:bg-green-500/30 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                            Да
                        </button>
                    </div>
                </div>
            </div>
        @endif

        @if($deleteError)
            <div class="fixed top-0 left-0 flex items-center justify-center w-full h-full overflow-y-auto bg-gray-600 bg-opacity-50 insert-0">
                <div class="relative m-4 w-2/5 min-w-[40%] max-w-[40%] rounded-lg bg-white font-sans text-base font-light leading-relaxed text-blue-gray-500 antialiased shadow-2xl">
                    <div class="flex items-center p-4 font-sans text-2xl antialiased font-semibold leading-snug shrink-0 text-blue-gray-900">
                    Удаление отдела невозможно!
                    </div>
                    <div class="relative p-4 font-sans text-base antialiased font-light leading-relaxed border-t border-b border-t-blue-gray-100 border-b-blue-gray-100 text-blue-gray-500">
                    Некоторые сотрудники состоят в данном отделе. Переведите сотрудников этого отдела в другой для удаления текущего.
                    </div>
                    <div class="flex flex-wrap items-center justify-end p-4 shrink-0 text-blue-gray-500">
                    <button wire:click.prevent='discardError()' class="px-6 py-3 mr-1 font-sans text-xs font-bold text-red-500 uppercase transition-all rounded-lg middle none center hover:bg-red-500/10 active:bg-red-500/30 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                        Ок
                    </button>
                    </div>
                </div>
            </div>
        @endif
    @endcan

    @endcan
</div>
