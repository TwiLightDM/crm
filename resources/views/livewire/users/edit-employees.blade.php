@php
    use App\Models\Department;
    use Spatie\Permission\Models\Role;
    $departments = Department::get();
    $roles = Role::get();
@endphp

<div>
    @if($tryEdit)

        <div class="flex justify-between">
            <p class='font-bold'>Сотрудник #{{$id}}</p>
            <button wire:click="closeEditor()" class="w-10 h-10 px-1 py-1 mb-5 colorR ctext"><img src="{{asset('/icons/cross.svg')}}" class='w-6 h-6 bg-cover fill-white'></button>
        </div>

        <p class="mb-1 Header colorA2">Общая информация</p>

         @if (session()->has('edit-info'))              
            <div class="grid h-10 grid-cols-9 mt-1 mb-1 bg-green-300">   
                <p class="col-span-9 ctext text-green-950">Обновлено</p>
            </div>
        @endif

        <form wire:submit.prevent="edit()" class="w-300">

            <div class="grid">
                <div class="grid grid-cols-6 mb-1">
                    <label class="myLabel">Фамилия</label>
                    <input class='col-span-5 input' type="text" min="1" placeholder="Иванов" wire:model.live="form.surname" @cannot('сотрудники (редактирование)')disabled @endcannot>
                </div>
                @error('form.surname') <div class="text-red-600 text-end">{{$message}}</div> @enderror
            </div>

            <div>
                <div class="grid grid-cols-6 mb-1">
                    <label class="myLabel">Имя</label>
                    <input class='col-span-5 input' type="text" placeholder="Иван" wire:model.live="form.name" @cannot('сотрудники (редактирование)')disabled @endcannot>
                </div>
                @error('form.name') <div class="text-red-600 text-end">{{$message}}</div> @enderror
            </div>

            <div class="grid">
                <div class="grid grid-cols-6 mb-1">
                    <label class="myLabel">Отчество</label>
                    <input class='col-span-5 input' type="text" min="1" placeholder="Иванович" wire:model.live="form.patronymic" @cannot('сотрудники (редактирование)')disabled @endcannot>
                </div>
                @error('form.patronymic') <div class="text-red-600 text-end">{{$message}}</div> @enderror
            </div>
            <div class="grid">
                <div class="grid grid-cols-6 mb-1">
                    <label class="myLabel">Отдел</label>
                    <select class='col-span-5 input' wire:model.live="form.department_id" @cannot('сотрудники (редактирование)')disabled @endcannot>
                            <option value="0">Не выбрано</option>
                        @foreach ($departments as $department)
                            <option value={{$department->id}}>{{$department->name}}</option>
                        @endforeach
                    </select>
                </div>
                @error('form.department_id') <div class="text-red-600 text-end">{{$message}}</div> @enderror
            </div>

            @can('сотрудники (редактирование)')
                <div class="grid grid-cols-6 gap-1 mb-5">
                    <button type="submit" class="col-start-6 btn colorA2">Изменить</button>
                </div>
            @endcan
        </form>

        @can('сотрудники (редактирование)')
            <p class="mb-1 Header colorA2">Изменить пароль</p>

             @if (session()->has('edit-password'))              
                <div class="grid h-10 grid-cols-9 mt-1 mb-1 bg-green-300">   
                    <p class="col-span-9 ctext text-green-950">Обновлено</p>
                </div>
            @endif

            <form wire:submit.prevent="editPassword()" class="w-300">
                <div>
                    <div class="grid grid-cols-6 mb-1">
                        <label class="myLabel">Пароль</label>
                        <input class='col-span-5 input' type="password" min="12" wire:model.live="formPassword.password" @cannot('сотрудники (редактирование)')disabled @endcannot>
                    </div>
                    @error('formPassword.password') <div class="text-red-600 text-end">{{$message}}</div> @enderror
                </div>

                <div class="grid">
                    <div class="grid grid-cols-6 mb-1">
                        <label class="myLabel">Подтверждение пароля</label>
                        <input class='col-span-5 input' type="password" min="12" wire:model.live="formPassword.password_confirmation" @cannot('сотрудники (редактирование)')disabled @endcannot>
                    </div>
                    @error('formPassword.password_confirmation') <div class="text-red-600 text-end">{{$message}}</div> @enderror
                </div>

                <div class="grid grid-cols-6 gap-1 mb-5">
                    <button type="submit" class="col-start-6 btn colorA2">Изменить</button>
                </div>
            </form>
        @endcan

        @can('сотрудники (редактирование)')
            <p class="mb-1 Header colorA2">Изменить роль</p>

             @if (session()->has('edit-role'))              
                <div class="grid h-10 grid-cols-9 mt-1 mb-1 bg-green-300">   
                    <p class="col-span-9 ctext text-green-950">Обновлено</p>
                </div>
            @endif

            <form wire:submit.prevent="editRole()" class="w-300">
                <div class="grid">
                    <div class="grid grid-cols-6 mb-1">
                        <label class="myLabel">Роль</label>
                        <select class='col-span-5 input' wire:model.live="formRole.role_id" @cannot('сотрудники (редактирование)')disabled @endcannot>
                                <option value="0">Не выбрано</option>
                            @foreach ($roles as $role)
                                @if(strcmp($role->name,'super-admin') != 0)
                                    <option value={{$role->id}}>{{$role->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    @error('formRole.role_id') <div class="text-red-600 text-end">{{$message}}</div> @enderror
                </div>

                <div class="grid grid-cols-6 gap-1 mb-5 ">
                    <button type="submit" class="col-start-6 btn colorA2">Изменить</button>
                </div>
            </form>
        @endcan
    @endif
</div>
