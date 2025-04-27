<div>
    @if($tryEdit)

        <div class="flex justify-between">
            <p class='col-span-5 font-bold'>Встреча # {{$id}}</p>
            <button wire:click="closeEditor()" class="w-10 h-10 px-1 py-1 mb-5 colorR ctext"><img src="{{asset('/icons/cross.svg')}}" class='w-6 h-6 bg-cover fill-white'></button>
        </div>

        @if (session()->has('edit-info'))
            <div class="grid h-10 grid-cols-9 mt-1 mb-1 bg-green-300">
                <p class="col-span-9 ctext text-green-950">Обновлено</p>
            </div>
        @endif

        <p class="mb-1 Header colorA2">Общая информация</p>

        <form wire:submit.prevent="edit()" class="w-300">

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
                    <option value="Назначена">Назначена</option>
                    <option value="Успешно завершена">Успешно завершена</option>
                    <option value="Завершена">Завершена</option>
                </select>
            </div>

            @can('встречи (редактирование)')
                <div class="grid grid-cols-6 gap-1">
                    <button type="submit" class="col-start-6 btn colorA2">Изменить</button>
                </div>
            @endcan
        </form>

        @can('проекты (создание)')
            <p class="mt-5 mb-1 Header colorA2">Создать ремонтную цель</p>

            <form wire:submit.prevent="createProject()" class="w-300">
                <div class="grid">
                    <div class="grid grid-cols-6 mb-1">
                        <label class="myLabel">Название</label>
                        <input class='col-span-5 input' type="text" placeholder="телефон" wire:model.live="formProject.name">
                    </div>
                    @error('formProject.name') <div class="text-red-600 text-end">{{$message}}</div> @enderror
                </div>

                <div class="grid">
                    <div class="grid grid-cols-6 mb-1">
                        <label class="myLabel">Дата Сдачи</label>
                        <input class='col-span-5 input' type="datetime-local" wire:model.live="formProject.date">
                    </div>
                    @error('formProject.date') <div class="text-red-600 text-end">{{$message}}</div> @enderror
                </div>

                <div class="grid">
                    <div class="grid grid-cols-6 mb-1">
                        <label class="myLabel">Изменить статус</label>
                        <input class='col-span-5 w-11 h-11 input' type="checkbox" wire:model.live="formProject.switch">
                    </div>
                </div>

                <div class="grid grid-cols-6 gap-1">
                    <button type="submit" class="col-start-6 btn colorA2">Создать</button>
                </div>
            </form>
        @endcan
    @endif
</div>
