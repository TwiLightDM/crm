<div>
    @if($task != null)
        <div class="flex justify-between">
            <p class='font-bold'>Задача # {{$task->id}}</p>
            <button wire:click="close()" class="w-10 h-10 px-1 py-1 mb-5 colorR ctext"><img src="{{asset('/icons/cross.svg')}}" class='w-6 h-6 bg-cover fill-white'></button>
        </div>

        <p class="mb-1 Header colorA2">Общая информация</p>

        <div class="w-300">

            <div class="grid grid-cols-6 mb-1">
                <p class="col-span-1 myLabel">Ремонт</p>
                <p class='flex items-center h-10 col-span-5 px-4 input borderC'>{{$task->project->name}}</p>
            </div>

            <div class="grid grid-cols-6 mb-1">
                <p class="col-span-1 myLabel">Дедлайн ремонта</p>
                <p class='flex items-center h-10 col-span-5 px-4 input borderC'>{{$task->project->date}}</p>
            </div>

            <div class="grid grid-cols-6 mb-1">
                <p class="col-span-1 myLabel">Задача</p>
                <p class='flex items-center h-10 col-span-5 px-4 input borderC'>{{$task->name}}</p>
            </div>

            @if ($task->status != 'Новая')
                <div class="grid grid-cols-6 mb-1">
                    <p class="col-span-1 myLabel">Исполнитель</p>
                    <p class='flex items-center h-10 col-span-5 px-4 input borderC'>{{$task->user->fullName()}}</p>
                </div>
            @endif

            <div class="grid grid-cols-6 mb-1">
                <p class="col-span-1 myLabel">Статус</p>
                <p class='flex items-center h-10 col-span-5 px-4 input borderC'>{{$task->status}}</p>
            </div>
        </div>
    @endif
</div>
