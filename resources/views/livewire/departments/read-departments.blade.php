<div>
    @if($department != null)
        <div class="flex justify-between">
            <p class='font-bold'>Отдел # {{$department->id}}</p>
            <button wire:click="close()" class="w-10 h-10 px-1 py-1 mb-5 colorR ctext"><img src="{{asset('/icons/cross.svg')}}" class='w-6 h-6 bg-cover fill-white'></button>
        </div>

        <p class="mb-1 Header colorA2">Общая информация</p>

        <div class="w-300">
            <div class="grid grid-cols-6 mb-1">
                <p class="col-span-1 myLabel">Название</label>
                <p class='flex items-center h-10 col-span-5 px-4 input borderC'>{{$department->name}}</p>
            </div>
        </div>

        @can('сотрудники (чтение)')
            <p class="mb-1 Header colorA2">Сотрудники</p>

            <div class="w-300">
                @foreach($department->users as $emp)
                <div class="grid grid-cols-6 mb-1">
                    <p class="col-span-1 myLabel">Сотрудник #{{$emp->id}}</p>
                    <p class='flex items-center h-10 col-span-5 px-4 input borderC'>{{$emp->fullName()}}</p>
                </div> 
                @endforeach
            </div>
        @endcan
    @endif
</div>