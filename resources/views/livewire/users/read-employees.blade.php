<div>
    @if($user != null)
        <div class="flex justify-between">
            <p class='font-bold'>Сотрудник # {{$user->id}}</p>
            <button wire:click="close()" class="w-10 h-10 px-1 py-1 mb-5 colorR ctext"><img src="{{asset('/icons/cross.svg')}}" class='w-6 h-6 bg-cover fill-white'></button>
        </div>

        <p class="mb-1 Header colorA2">Общая информация</p>

        <div class="w-300">

            <div class="grid grid-cols-6 mb-1">
                <p class="col-span-1 myLabel">Фамилия</label>
                <p class='flex items-center h-10 col-span-5 px-4 input borderC'>{{$user->surname}}</p>
            </div>

            <div class="grid grid-cols-6 mb-1">
                <p class="col-span-1 myLabel">Имя</label>
                <p class='flex items-center h-10 col-span-5 px-4 input borderC'>{{$user->name}}</p>
            </div>

            <div class="grid grid-cols-6 mb-1">
                <p class="col-span-1 myLabel">Отчество</label>
                <p class='flex items-center h-10 col-span-5 px-4 input borderC'>{{$user->patronymic}}</p>
            </div>

            <div class="grid grid-cols-6 mb-1">
                <p class="col-span-1 myLabel">Почта</label>
                <p class='flex items-center h-10 col-span-5 px-4 input borderC'>{{$user->email}}</p>
            </div>

            <div class="grid grid-cols-6 mb-1">
                <p class="col-span-1 myLabel">Отдел</label>
                <p class='flex items-center h-10 col-span-5 px-4 input borderC'>{{$user->department->name}}</p>
            </div>

            <div class="grid grid-cols-6 mb-1">
                <p class="col-span-1 myLabel">Число встреч</p>
                <p class='flex items-center h-10 col-span-5 px-4 input borderC'>{{$user->meetings()->count()}}</p>
            </div>

            <div class="grid grid-cols-6 mb-1">
                <p class="col-span-1 myLabel">Число задач</p>
                <p class='flex items-center h-10 col-span-5 px-4 input borderC'>{{$user->tasks()->count()}}</p>
            </div> 

            <div class="grid grid-cols-6 mb-1">
                <p class="col-span-1 myLabel">Статус</label>
                <p class='flex items-center h-10 col-span-5 px-4 input borderC'>{{!$user->blocked ? 'Активен' : 'Заблокирован'}}</p>
            </div>
        </div>
    @endif
</div>