@php
    use App\Models\User;
    $users = User::get();
@endphp

<div>
    @if($tryEdit)

        <div class="flex justify-between">
            <p class='col-span-5 font-bold'>Роль #{{$id}}</p>
            <button wire:click="closeEditor()" class="w-10 h-10 px-1 py-1 mb-5 colorR ctext"><img src="{{asset('/icons/cross.svg')}}" class='w-6 h-6 bg-cover fill-white'></button>
        </div>

        @if (session()->has('edit-info'))              
            <div class="grid h-10 grid-cols-9 mt-1 mb-1 bg-green-300">   
                <p class="col-span-9 ctext text-green-950">Обновлено</p>
            </div>
        @endif

        <form wire:submit.prevent="edit()">
            <div class="grid">
                <div class="grid grid-cols-6 mb-1">
                    <label class="myLabel">Задача</label>
                    <input class='col-span-5 input' type="text" min="1" placeholder="accountant" wire:model.live="form.name">
                </div>
                @error('form.name') <div class="text-red-600 text-end">{{$message}}</div> @enderror
            </div>

            <div class="grid">
                <div class="grid grid-cols-6 mb-1">
                    <label class="myLabel">Исполнитель</label>
                    <select class='col-span-5 input' wire:model.live="form.user_id">
                            <option value="">Нет исполнителя</option>
                        @foreach ($users as $user)
                            <option value={{$user->id}}>{{$user->fio()}}</option>
                        @endforeach
                    </select>
                </div>
                @error('form.user_id') <div class="text-red-600 text-end">{{$message}}</div> @enderror
            </div>

            <div class="grid">
                <div class="grid grid-cols-6 mb-1">
                    <label class="myLabel">Исполнитель</label>
                    <select class='col-span-5 input' wire:model.live="form.status">
                        <option value="Новая">Новая</option>
                        <option value="В работе">В работе</option>
                        <option value="Выполнена">Выполнена</option>
                    </select>
                </div>
                @error('form.status') <div class="text-red-600 text-end">{{$message}}</div> @enderror
            </div>

            
            @can('роли (редактирование)')
                <div class="grid grid-cols-4 gap-1 mt-5">
                    <button type="submit" class="col-start-4 btn colorA2">Изменить</button>
                </div>
            @endcan
        </form>
    @endif
</div>
