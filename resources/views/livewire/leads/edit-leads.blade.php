 <div>
    @if($tryEdit)

        <div class="flex justify-between">
            <p class='font-bold'>Лид # {{$id}}</p>
            <button wire:click="closeEditor()" class="w-10 h-10 px-1 py-1 mb-5 ctext"><img src="{{asset('/icons/cross.svg')}}" class='w-6 h-6 bg-cover fill-white'></button>
        </div>

        @if (session()->has('edit-info'))              
            <div class="grid h-10 grid-cols-9 mt-1 mb-1 bg-green-300">   
                <p class="col-span-9 ctext text-green-950">Обновлено</p>
            </div>
        @endif

        <p class="mb-2 mt-2 font-bold Header colorA2">Общая информация</p>

        <form wire:submit.prevent="edit()" class="w-300">

            <div class="grid">
                <div class="grid grid-cols-6 mb-1">
                    <label class="myLabel">Фамилия</label>
                    <input class='col-span-5 input' type="text" min="1" placeholder="Иванов" wire:model.live="form.surname">
                </div>
                @error('form.surname') <div class="text-red-600 text-end">{{$message}}</div> @enderror
            </div>

            <div class="grid">
                <div class="grid grid-cols-6 mb-1">
                    <label class="myLabel">Имя</label>
                    <input class='col-span-5 input' type="text" min="1" placeholder="Иванов" wire:model.live="form.name">
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
                    <label class="myLabel">Телефон</label>
                    <input class='col-span-5 input' type="text" min="1" placeholder="(8/+7)XXXXXXXXXX" wire:model.live="form.phone">
                </div>
                @error('form.phone') <div class="text-red-600 text-end">{{$message}}</div> @enderror
            </div>

            <div class="grid grid-cols-6 mb-1">
                <label class="myLabel">Статус</label>
                <select class='col-span-5 input' wire:model="form.status">
                    <option value="Новый">Новый</option>
                    <option value="Назначена встреча">Назначена Встреча</option>
                    <option value="Ожидает выполнения">Ожидает выполнения</option>
                    <option value="Завершено">Завершено</option>
                </select>
            </div>
                    
            @can('лиды (редактирование)')
                <div class="grid grid-cols-6 gap-1">
                    <button type="submit" class="col-start-6 btn colorA2 bg-beige hover:bg-beige-dark text-gray-800 shadow-md hover:shadow-xl rounded-lg mt-3 mb-1">Изменить</button>
                </div>
            @endcan
            
        </form>

        @can('встречи (создание)')
            <p class="mt-5 mb-2 Header colorA2 font-bold">Назначение встречи</p>

            <form wire:submit.prevent="createMeeting()" class="w-300">
                <div class="grid">
                    <div class="grid grid-cols-6 mb-1">
                        <label class="myLabel">Дата</label>
                        <input class='col-span-5 input' type="datetime-local" min="1" placeholder="Иванович" wire:model.live="formMeeting.date">
                    </div>
                    @error('formMeeting.date') <div class="text-red-600 text-end">{{$message}}</div> @enderror
                </div>

                <div class="grid">
                    <div class="grid grid-cols-6 mb-1">
                        <label class="myLabel">Изменить статус</label>
                        <input class='col-span-5 w-11 h-11 input' type="checkbox" wire:model.live="formMeeting.switch">
                    </div>
                </div>

                <div class="grid grid-cols-6 gap-1">
                    <button type="submit" class="col-start-6 btn colorA2 bg-beige hover:bg-beige-dark text-gray-800 shadow-md hover:shadow-xl rounded-lg mt-3 mb-1">Назначить</button>
                </div>
            </form>
        @endcan
    @endif
</div>
