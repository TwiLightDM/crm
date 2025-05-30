<div>
    @isset($lead)
        @if($lead !== null)
            <div class="flex justify-between">
                <p class='font-bold'>Лид # {{ $lead->id }}</p>
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
    @else
        <p class="mb-2 font-semibold text-lg">Лиды, созданные сегодня:</p>

        @forelse($todayLeads as $item)
            <div wire:click="launchCreator({{ $item->id }})"
                 class="cursor-pointer p-3 mb-2 border border-gray-300 rounded-lg hover:bg-gray-100 transition">
                <p><strong>#{{ $item->id }}</strong> — {{ $item->surname }} {{ $item->name }}</p>
                @if($item->created_at)
                    <p class="text-sm text-gray-500">{{ $item->created_at->format('H:i d.m.Y') }}</p>
                @else
                @endif
            </div>
        @empty
            <p>Сегодня лидов не создано.</p>
        @endforelse
    @endisset
</div>
