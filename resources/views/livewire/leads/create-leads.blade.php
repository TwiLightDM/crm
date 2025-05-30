<div>
    @if($tryCreate)

        <div class="flex justify-between">
            <p class='col-span-5 font-bold'>Добавление нового лида</p>
            <button wire:click="closeEditor()" class="w-10 h-10 px-1 py-1 mb-4 ctext"><img src="{{asset('/icons/cross.svg')}}" class='w-6 h-6 bg-cover fill-white'></button>
        </div>


        <form wire:submit.prevent="create()" class="w-300">

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
                    <input class='col-span-5 input' type="text" min="1" placeholder="Ильич" wire:model.live="form.patronymic">
                </div>
                @error('form.patronymic') <div class="text-red-600 text-end">{{$message}}</div> @enderror
            </div>
            <div class="grid">
                <div class="grid grid-cols-6 mb-1">
                    <label class="myLabel">Телефон</label>
                    <input class='col-span-5 input' type="text" min="1" placeholder="+7XXXXXXXXXX" wire:model.live="form.phone">
                </div>
                @error('form.phone') <div class="text-red-600 text-end">{{$message}}</div> @enderror
            </div>

            @can('лиды (создание)')
                <div class="grid grid-cols-6 gap-1 mt-3">
                    <button type="submit" class="col-start-6 btn colorA2 bg-beige hover:bg-beige-dark text-gray-800 shadow-md hover:shadow-xl rounded-lg mt-3 mb-1">Создать</button>
                </div>
            @endcan
        </form>
    @endif
</div>
