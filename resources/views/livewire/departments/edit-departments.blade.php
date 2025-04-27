<div>
    @if($tryEditOrCreate)

            <div class="flex justify-between">
                <p class='col-span-5 font-bold'>@if($id == null) Новый отдел @else Отдел #{{$id}}@endif</p>
                <button wire:click="closeEditor()" class="w-10 h-10 px-1 py-1 mb-5 colorR ctext"><img src="{{asset('/icons/cross.svg')}}" class='w-6 h-6 bg-cover fill-white'></button>
            </div>


             @if (session()->has('edit-info'))              
                <div class="grid h-10 grid-cols-9 mt-1 mb-1 bg-green-300 rounded">   
                    <p class="col-span-9 ctext text-green-950">Обновлено</p>
                </div>
            @endif

            <form wire:submit.prevent="editOrCreate()" class="w-300">

                <div>
                    <div class="grid grid-cols-6 mb-1">
                        <label class="myLabel">Название</label>
                        <input class='col-span-5 rounded-r input' type="text" placeholder="Отдел" wire:model.live="form.name" @if($id != null) @cannot('отделы (редактирование)')disabled @endcannot @endif>
                    </div>
                    @error('form.name') <div class="text-red-600 text-end">{{$message}}</div> @enderror
                </div>

                <div class="grid grid-cols-6 gap-1">
                    @if ($id == null)
                        <button type="submit" class="col-start-6 btn colorA2">Создать</button>
                    @else
                        @can('отделы (редактирование)')
                            <button type="submit" class="col-start-6 btn colorA2">Изменить</button>
                        @endcan
                    @endif
                </div>
            </form>
        @endif
</div>