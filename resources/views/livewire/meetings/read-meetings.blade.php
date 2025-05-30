<div>
    @if($meeting != null)
        <div class="flex justify-between">
            <p class='font-bold'>Встреча # {{$meeting->id}}</p>
            <button wire:click="close()" class="w-10 h-10 px-1 py-1 mb-5 ctext"><img src="{{asset('/icons/cross.svg')}}" class='w-6 h-6 bg-cover fill-white'></button>
        </div>

        <p class="mb-2 mt-2 font-bold Header colorA2">Общая информация</p>

        <div class="w-300">

            <div class="grid grid-cols-6 mb-1">
                <p class="col-span-1 myLabel">Лид</p>
                <p class='flex items-center h-10 col-span-5 px-4 input borderC'>{{$meeting->lead->fullName()}} ({{$meeting->lead->phone}})</p>
            </div>

            <div class="grid grid-cols-6 mb-1">
                <p class="col-span-1 myLabel">Назначил</p>
                <p class='flex items-center h-10 col-span-5 px-4 input borderC'>{{$meeting->user->fullName()}}</p>
            </div>

            <div class="grid grid-cols-6 mb-1">
                <p class="col-span-1 myLabel">Дата</p>
                <p class='flex items-center h-10 col-span-5 px-4 input borderC'>{{$meeting->date}}</p>
            </div>

            <div class="grid grid-cols-6 mb-1">
                <p class="col-span-1 myLabel">Статус</p>
                <p class='flex items-center h-10 col-span-5 px-4 input borderC'>{{$meeting->status}}</p>
            </div>
        </div>
    @endif
</div>
