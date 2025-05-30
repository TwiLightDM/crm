<div>
    @if($role != null)
        <div class="flex justify-between">
            <p class='font-bold'>Роль # {{$role->id}}</p>
            <button wire:click="close()" class="w-10 h-10 px-1 py-1 mb-5 ctext"><img src="{{asset('/icons/cross.svg')}}" class='w-6 h-6 bg-cover fill-white'></button>
        </div>

        <p class="mb-2 mt-2 Header colorA2 font-bold">Общая информация</p>

        <div class="w-300">
            <div class="grid grid-cols-6 mb-1">
                <p class="col-span-1 myLabel">Название</p>
                <p class='flex items-center h-10 col-span-5 px-4 input borderC'>{{$role->name}}</p>
            </div>
        </div>

        <p class="mb-1 mt-5 font-bold Header colorA2">Разрешения</p>

        <div>
            @php($i = 0)
            <div class='grid grid-cols-4 gap-x-2'>
                @foreach ($permissions as $name => $value)

                    <div class="h-10 mt-1 mb-1 space-x-0.5 flex grid-col-1">
                        <div  class="w-full ctext colorA3 borderC">
                            <p class="text-black">{{$name}}</p>
                        </div>
                        @if ($value)
                            <img class='w-10 h-10' src="{{asset('/icons/tick-green.svg')}}">
                        @else
                            <img class='w-10 h-10' src="{{asset('/icons/cross-red.svg')}}">
                        @endif
                    </div>

                    @php($i = $i + 1)
                @endforeach
            </div>
        </div>

        @can('сотрудники (чтение)')
            <p class="mb-2 mt-5 font-bold Header colorA2">Пользователи Роли</p>

            <div class="w-300">
                @foreach(App\Models\User::select('users.*')
                        ->join('model_has_roles','model_has_roles.model_id','=','users.id')
                        ->join('roles','roles.id','=','model_has_roles.role_id')
                        ->where('roles.id',$role->id)
                        ->get() as $emp)
                <div class="grid grid-cols-6 mb-1">
                    <p class="col-span-1 myLabel">Сотрудник #{{$emp->id}}</p>
                    <p class='flex items-center h-10 col-span-5 px-4 input borderC'>{{$emp->fullName()}}</p>
                </div>
                @endforeach
            </div>
        @endcan
    @endif
</div>
