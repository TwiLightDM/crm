<div>
    @if($tryEdit)

        <div class="flex justify-between">
            <p class='col-span-5 font-bold'>Телефон # {{$id}}</p>
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
                    <label class="myLabel">Имя</label>
                    <input class='col-span-5 input' type="text" min="1" placeholder="Иванов" wire:model.live="form.name">
                </div>
                @error('form.name') <div class="text-red-600 text-end">{{$message}}</div> @enderror
            </div>
            <div class="grid">
                <div class="grid grid-cols-6 mb-1">
                    <label class="myLabel">Дата</label>
                    <input class='col-span-5 input' type="datetime-local" min="1" placeholder="Иванович" wire:model.live="form.date">
                </div>
                @error('form.date') <div class="text-red-600 text-end">{{$message}}</div> @enderror
            </div>
            <div class="grid grid-cols-6 mb-1">
                <label class="myLabel">Статус</label>
                <select class='col-span-5 input' wire:model="form.status">
                    <option value="Создан">Создан</option>
                    <option value="В работе">В работе</option>
                    <option value="Завершен">Завершен</option>
                </select>
            </div>

            @can('проекты (редактирование)')
                <div class="grid grid-cols-6 gap-1">
                    <button type="submit" class="col-start-6 btn colorA2 bg-beige hover:bg-beige-dark text-gray-800 shadow-md hover:shadow-xl rounded-lg mt-3 mb-1">Изменить</button>
                </div>
            @endcan
        </form>

        @can('задачи (создание)')
            <p class="mt-5 mb-2 font-bold Header colorA2">Создать Задачу</p>

            <form wire:submit.prevent="createTask()" class="w-300">
                <div class="grid">
                    <div class="grid grid-cols-6 mb-1">
                        <label class="myLabel">Задача</label>
                        <input class='col-span-5 input' type="text" placeholder="Заменить стекло" wire:model.live="formTask.name">
                    </div>
                    @error('formTask.name') <div class="text-red-600 text-end">{{$message}}</div> @enderror
                </div>

                <div class="grid grid-cols-6 gap-1">
                    <button type="submit" class="col-start-6 btn colorA2 bg-beige hover:bg-beige-dark text-gray-800 shadow-md hover:shadow-xl rounded-lg mt-3 mb-1">Создать</button>
                </div>
            </form>
        @endcan
    @endif
</div>
