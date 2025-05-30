<div>
    @can('проекты (чтение)')
    @if($isClosedEditor)

        <div class="grid grid-cols-2 mb-5">

            <form class="col-span-1 mr-5" wire:submit.prevent>
                <div class="grid grid-cols-6">
                    <div class='flex items-center justify-between w-full col-span-3'>
                        <label class="w-12 h-full myLabel colorA2"><img src="{{asset('/icons/search.svg')}}" class='w-6 h-6 bg-cover fill-white'></label>
                        <select wire:model.live="form.field" class="flex items-center justify-center w-full border-r-0 input">
                            <option value="id">Id</option>
                            <option value="lead_id">Навзание</option>
                            <option value="status">Статус</option>
                        </select>
                    </div>

                    <div class='flex items-center justify-between w-full col-span-3'>
                        <input type='text' wire:model.live="form.text" class='flex items-center justify-center w-full input'>
                        <button type='reset' wire:click.live='resetSearch()' class="w-12 h-full px-1 py-1 ctext"><img src="{{asset('/icons/cross.svg')}}" class='w-6 h-6 bg-cover fill-white'></button>
                    </div>
                </div>
            </form>

            <form class="col-span-1" wire:submit.prevent>
                <div class="grid grid-cols-6">
                    <div class='flex items-center justify-between w-full col-span-3'>
                        <label class="w-12 h-full myLabel colorA2">
                            @if ($sort->dir == 'asc' )
                                <img src="{{asset('/icons/down.svg')}}" class='w-6 h-6 bg-cover fill-white'>
                            @else
                                <img src="{{asset('/icons/up.svg')}}" class='w-6 h-6 bg-cover fill-white'>
                            @endif
                        </label>
                        <select wire:model.live="sort.field" class="flex items-center justify-center w-full border-r-0 input">
                            <option value="id">Id</option>
                            <option value="lead_id">Название</option>
                            <option value="date">Дедлайн</option>
                            <option value="status">Статус</option>
                        </select>
                    </div>

                    <div class='flex items-center justify-between w-full col-span-3'>
                        <select wire:model.live="sort.dir" class='flex items-center justify-center w-full input'>
                            <option value="desc">по убыванию</option>
                            <option value="asc">по возрастанию</option>
                        </select>
                        <button type='reset' wire:click.live='resetSort()' class="w-12 h-full px-1 py-1 ctext"><img src="{{asset('/icons/cross.svg')}}" class='w-6 h-6 bg-cover fill-white'></button>
                    </div>
                </div>
            </form>
        </div>

            <div>
                <div class="grid grid-cols-11 mt-1 mb-1 space-x-0.5">
                    <p class="col-span-1 h-7 borderA text-center colorA2">Id</p>
                    <p class="col-span-2 h-7 borderA text-center colorA2">Название</p>
                    <p class="col-span-2 h-7 borderA text-center colorA2">Лид</p>
                    <p class="col-span-2 h-7 borderA text-center colorA2">Дедлайн</p>
                    <div class="col-span-4">
                        <div class="flex flex-row h-full space-x-0.5">

                            <div class="w-full borderA colorA2">
                                <p class='flex items-center justify-center h-7'>Статус</p>
                            </div>

                            <div class='flex space-x-0.5'>
                                <div class='flex items-center justify-center w-10 borderA colorA2'>
                                </div>

                                @can('встречи (редактирование)')
                                    <div class='flex items-center justify-center w-10 colorA2'>
                                    </div>
                                @endcan

                                @can('встречи (удаление)')
                                    <div class='flex items-center justify-center w-10 colorA2'>
                                    </div>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>

                @foreach($projects as $project)
                    <div class="grid h-8 grid-cols-11 mt-1 mb-1 space-x-0.5">
                        <div class="col-span-1 borderC">
                            <p class='flex items-center justify-center h-8'>{{$project->id}}</p>
                        </div>
                        <div class="col-span-2 borderC">
                            <p class='flex items-center justify-center h-8'>{{$project->name}}</p>
                        </div>
                        <div class="col-span-2 borderC">
                            <p class='flex items-center justify-center h-8'>({{$project->lead_id}}) {{$project->lead->fio()}}</p>
                        </div>
                        <div class="col-span-2 borderC">
                            <p class='flex items-center justify-center h-8'>{{$project->date}} </p>
                        </div>
                        <div class="col-span-4">
                            <div class="flex flex-row h-full space-x-0.5">
                                <div class="w-full col-span-3 borderC">
                                    <p class='flex items-center justify-center h-8'>{{$project->status}} </p>
                                </div>

                                <div class="space-x-0.5 flex">
                                    <button wire:key='read_projects_{{$project->id}}' wire:click="read({{$project->id}})" class='flex items-center justify-center w-10'>
                                        <img src="{{asset('/icons/info.svg')}}" class='w-8 h-8 bg-cover fill-white'>
                                    </button>
                                    @can('проекты (редактирование)')
                                        <button wire:key='edit_projects_{{$project->id}}' wire:click="edit({{$project->id}})" class='flex items-center justify-center w-10'>
                                            <img src="{{asset('/icons/edit.svg')}}" class='w-8 h-8 bg-cover fill-white'>
                                        </button>
                                    @endcan
                                    @can('проекты (удаление)')
                                        <button wire:key='del_projects_{{$project->id}}' wire:click="try2Delete({{$project->id}})" class='flex items-center justify-center w-10'>
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

    <livewire:projects.edit-projects>
    <livewire:projects.read-projects>

    @can('проекты (удаление)')
        @if($del_id != 0)
            <div class="fixed top-0 left-0 flex items-center justify-center w-full h-full overflow-y-auto bg-gray-600 bg-opacity-50 insert-0">
                <div class="relative m-4 w-2/5 min-w-[40%] max-w-[40%] rounded-lg bg-white font-sans text-base font-light leading-relaxed text-blue-gray-500 antialiased shadow-2xl">
                    <div class="flex items-center p-4 font-sans text-2xl antialiased font-semibold leading-snug shrink-0 text-blue-gray-900">
                        Удаление лида
                    </div>
                    <div class="relative p-4 font-sans text-base antialiased font-light leading-relaxed border-t border-b border-t-blue-gray-100 border-b-blue-gray-100 text-blue-gray-500">
                        Вы точно хотите удалить Телефон? Все связанные с ним задачи будут удалены! Это действие нельзя будет отменить!
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
    @endcan

    @endcan
</div>
