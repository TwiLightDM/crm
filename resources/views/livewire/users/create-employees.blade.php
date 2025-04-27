@php
    use App\Models\Department;
    use Spatie\Permission\Models\Role;
    $departments = Department::get();
    $roles = Role::where('name','<>','super-admin')->get();
@endphp

<div>
@can('сотрудники (чтение)')
    @if($tryCreate)

        <div class="flex justify-between">
            <p class='col-span-5 font-bold'>Новый Пользователь</p>
            <button wire:click="closeEditor()" class="w-10 h-10 px-1 py-1 mb-4 colorR ctext"><img src="{{asset('/icons/cross.svg')}}" class='w-6 h-6 bg-cover fill-white'></button>
        </div>

        <form wire:submit.prevent="create()" class="w-300">

            <div class="grid">
                <div class="grid grid-cols-6 mb-1">
                    <label class="myLabel">Фамилия</label>
                    <input class='col-span-5 input' type="text" min="1" placeholder="Иванов" wire:model.live="form.surname">
                </div>
                @error('form.surname') <div class="text-red-600 text-end">{{$message}}</div> @enderror
            </div>

            <div>
                <div class="grid grid-cols-6 mb-1">
                    <label class="myLabel">Имя</label>
                    <input class='col-span-5 input' type="text" placeholder="Иван" wire:model.live="form.name">
                </div>
                @error('form.name') <div class="text-red-600 text-end">{{$message}}</div> @enderror
            </div>

            <div class="grid">
                <div class="grid grid-cols-6 mb-1">
                    <label class="myLabel">Отчество</label>
                    <input class='col-span-5 input' type="text" min="1" placeholder="Иванович" wire:model.live="form.patronymic">
                </div>
                @error('form.patronymic') <div class="text-red-600 text-end">{{$message}}</div> @enderror
            </div>
            <div class="grid">
                <div class="grid grid-cols-6 mb-1">
                    <label class="myLabel">Email</label>
                    <input class='col-span-5 input' type="text" min="1" placeholder="X@X.X" wire:model.live="form.email">
                </div>
                @error('form.email') <div class="text-red-600 text-end">{{$message}}</div> @enderror
            </div>
            <div class="grid">
                <div class="grid grid-cols-6 mb-1">
                    <label class="myLabel">Отдел</label>
                    <select class='col-span-5 input' wire:model.live="form.department_id">
                            <option value="0">Не выбрано</option>
                        @foreach ($departments as $department)
                            <option value={{$department->id}}>{{$department->name}}</option>
                        @endforeach
                    </select>
                </div>
                @error('form.department_id') <div class="text-red-600 text-end">{{$message}}</div> @enderror
            </div>
            <div class="grid">
                <div class="grid grid-cols-6 mb-1">
                    <label class="myLabel">Роль</label>
                    <select class='col-span-5 input' wire:model.live="form.role_id">
                            <option value="0">Не выбрано</option>
                        @foreach ($roles as $role)
                            @if(strcmp($role->name,'super-user') != 0)
                                <option value={{$role->id}}>{{$role->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                @error('form.role_id') <div class="text-red-600 text-end">{{$message}}</div> @enderror
            </div>
            <div>
                <div class="grid grid-cols-6 mb-1">
                    <label class="myLabel">Пароль</label>
                    <input class='col-span-5 input' type="password" min="12" wire:model.live="form.password">
                </div>
                @error('form.password') <div class="text-red-600 text-end">{{$message}}</div> @enderror
            </div>

            <div class="grid">
                <div class="grid grid-cols-6 mb-1">
                    <label class="myLabel">Подтверждение пароля</label>
                    <input class='col-span-5 input' type="password" min="12" wire:model.live="form.password_confirmation">
                </div>
                @error('form.password_confirmation') <div class="text-red-600 text-end">{{$message}}</div> @enderror
            </div>
                <div class="grid grid-cols-6 gap-1 mt-5">
                    <button type="submit" class="col-start-6 btn colorA2">Зарегистрировать</button>
                </div>
        </form>
    @endif
@endcan
</div>