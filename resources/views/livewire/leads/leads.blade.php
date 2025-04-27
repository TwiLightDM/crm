<div>
    @can('лиды (чтение)')
    @if($isClosedEditor)


        <div class="grid grid-cols-7 mb-5">

            <form class="col-span-3 mr-5" wire:submit.prevent>
                <div class="grid grid-cols-6">
                    <div class='flex items-center justify-between w-full col-span-3'>
                        <label class="w-12 h-full myLabel colorA2"><img src="{{asset('/icons/search.svg')}}" class='w-6 h-6 bg-cover fill-white'></label>
                        <select wire:model.live="form.field" class="flex items-center justify-center w-full border-l-0 border-r-0 input">
                            <option value="id">Id</option>
                            <option value="surname">Фамилия</option>
                            <option value="phone">Телефон</option>
                            <option value="status">Статус</option>
                        </select>
                    </div>

                    <div class='flex items-center justify-between w-full col-span-3'>
                        <input type='text' wire:model.live="form.text" class='flex items-center justify-center w-full input'>
                        <button type='reset' wire:click.live='resetSearch()' class="flex items-center justify-center w-12 h-full px-1 py-1 colorR">
                            <img src="{{asset('/icons/cross.svg')}}" class='w-6 h-6 bg-cover fill-white'>
                        </button>
                    </div>
                </div>
            </form>

            <form class="col-span-3 mr-5" wire:submit.prevent>
                <div class="grid grid-cols-6">
                    <div class='flex items-center justify-between w-full col-span-3'>
                        <label class="w-12 h-full myLabel colorA2">
                            @if ($sort->dir == 'asc' )
                                <img src="{{asset('/icons/down.svg')}}" class='w-6 h-6 bg-cover fill-white'>
                            @else
                                <img src="{{asset('/icons/up.svg')}}" class='w-6 h-6 bg-cover fill-white'>
                            @endif
                        </label>
                        <select wire:model.live="sort.field" class="flex items-center justify-center w-full border-l-0 border-r-0 input">
                            <option value="id">Id</option>
                            <option value="surname">Фамилия</option>
                            <option value="status">Статус</option>
                        </select>
                    </div>

                    <div class='flex items-center justify-between w-full col-span-3'>
                        <select wire:model.live="sort.dir" class='flex items-center justify-center w-full input'>
                            <option value="desc">по убыванию</option>
                            <option value="asc">по возрастанию</option>                          
                        </select>
                        <button type='reset' wire:click.live='resetSort()' class="flex items-center justify-center w-12 h-full px-1 py-1 colorR">
                            <img src="{{asset('/icons/cross.svg')}}" class='w-6 h-6 bg-cover fill-white'>
                        </button>
                    </div>
                </div>
            </form>

            @can('лиды (создание)')
                <div class="col-span-1 colorA2">
                    <button wire:click='createLead()' class="flex items-center justify-between w-full btn">
                        <img src="{{asset('/icons/add.svg')}}" class='w-6 h-6 ml-1 bg-cover fill-white'>
                        <span class='mr-3'>Лид</span>
                    </button>
                </div>
            @endcan
        </div>

            <div>
                <div class="grid grid-cols-11 mt-1 mb-1 space-x-0.5">
                    <p class="col-span-1 h-7 borderA colorA2">Id</p>
                    <p class="col-span-3 h-7 borderA colorA2">ФИО</p>
                    <p class="col-span-3 h-7 borderA colorA2">Телефон</p>

                    <div class="col-span-4">
                        <div class="flex flex-row h-full space-x-0.5">

                            <div class="w-full col-span-3 borderA colorA2">
                                <p class='flex items-center justify-center h-7'>Статус</p>
                            </div>
                            
                            <div class='flex space-x-0.5'>
                                <div class='flex items-center justify-center w-10 borderA colorA2'> 
                                </div>

                                @can('лиды (редактирование)')
                                    <div class='flex items-center justify-center w-10 colorA2'> 
                                    </div>
                                @endcan

                                @can('лиды (удаление)')
                                    <div class='flex items-center justify-center w-10 colorA2'> 
                                    </div>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>

                @foreach($leads as $lead)
                    <div class="grid grid-cols-11 mt-1 mb-1 space-x-0.5">
                        <div class="col-span-1 borderC">
                            <p class='flex items-center justify-center h-8'>{{$lead->id}}</p>
                        </div>
                        <div class="col-span-3 borderC">
                            <p class='flex items-center justify-center h-8'>{{$lead->fio()}}</p>
                        </div>
                        <div class="col-span-3 borderC">
                            <p class='flex items-center justify-center h-8'>{{$lead->phone}} </p>
                        </div>
                        <div class="col-span-4">
                            <div class="flex flex-row h-full space-x-0.5">
                                <div class="w-full col-span-3 borderC">
                                    <p class='flex items-center justify-center h-8'>{{$lead->status}} </p>
                                </div>

                                <div class="space-x-0.5 flex">
                                    <button wire:key='read_leads_{{$lead->id}}' wire:click="readLead({{$lead->id}})" class='flex items-center justify-center w-10 colorA'>
                                        <img src="{{asset('/icons/info.svg')}}" class='w-8 h-8 bg-cover fill-white'>
                                    </button>
                                    @can('лиды (редактирование)')
                                        <button wire:key='edit_leads_{{$lead->id}}' wire:click="editLead({{$lead->id}})" class='flex items-center justify-center w-10 colorB'>
                                            <img src="{{asset('/icons/edit.svg')}}" class='w-8 h-8 bg-cover fill-white'>
                                        </button>
                                    @endcan
                                    @can('лиды (удаление)')
                                        <button wire:key='del_leads_{{$lead->id}}' wire:click="try2Delete({{$lead->id}})" class='flex items-center justify-center w-10 colorR'>
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

    <livewire:leads.edit-leads>
    <livewire:leads.create-leads>
    <livewire:leads.read-leads>

    @can('лиды (удаление)')
        @if($del_id != 0)
            <div class="fixed top-0 left-0 flex items-center justify-center w-full h-full overflow-y-auto bg-gray-600 bg-opacity-50 insert-0">
                <div class="relative m-4 w-2/5 min-w-[40%] max-w-[40%] rounded-lg bg-white font-sans text-base font-light leading-relaxed text-blue-gray-500 antialiased shadow-2xl">
                    <div class="flex items-center p-4 font-sans text-2xl antialiased font-semibold leading-snug shrink-0 text-blue-gray-900">
                        Удаление лида
                    </div>
                    <div class="relative p-4 font-sans text-base antialiased font-light leading-relaxed border-t border-b border-t-blue-gray-100 border-b-blue-gray-100 text-blue-gray-500">
                        Вы точно хотите удалить лида? Вместе с ним будет удалена история его обучения. Это действие нельзя будет отменить!
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
