<div>
    @isset($lead)
        @if($lead !== null)
            <div class="flex justify-between">
                <p class='font-bold'>Лид # {{$lead->id}}</p>
                <button wire:click="close()" class="w-10 h-10 px-1 py-1 mb-5 ctext">
                    <img src="{{ asset('/icons/cross.svg') }}" class='w-6 h-6 bg-cover fill-white'>
                </button>
            </div>

            <p class="mb-2 mt-2 Header colorA2 font-bold">Общая информация</p>

            <div class="w-300">
                <div class="grid grid-cols-6 mb-1">
                    <p class="col-span-1 myLabel">Фамилия</p>
                    <p class='flex items-center h-10 col-span-5 px-4 input borderC'>{{ $lead->surname }}</p>
                </div>

                <div class="grid grid-cols-6 mb-1">
                    <p class="col-span-1 myLabel">Имя</p>
                    <p class='flex items-center h-10 col-span-5 px-4 input borderC'>{{ $lead->name }}</p>
                </div>

                <div class="grid grid-cols-6 mb-1">
                    <p class="col-span-1 myLabel">Отчество</p>
                    <p class='flex items-center h-10 col-span-5 px-4 input borderC'>{{ $lead->patronymic }}</p>
                </div>

                <div class="grid grid-cols-6 mb-1">
                    <p class="col-span-1 myLabel">Телефон</p>
                    <p class='flex items-center h-10 col-span-5 px-4 input borderC'>{{ $lead->phone }}</p>
                </div>

                <div class="grid grid-cols-6 mb-1">
                    <p class="col-span-1 myLabel">Статус</p>
                    <p class='flex items-center h-10 col-span-5 px-4 input borderC'>{{ $lead->status }}</p>
                </div>
            </div>
        @endif
    @endisset
</div>
