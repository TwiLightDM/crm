<div>
    @if($tryEditOrCreate)

        <div class="flex justify-between">
            <p class='col-span-5 font-bold'>@if($id == null) Новая роль @else Роль #{{$id}}@endif</p>
            <button wire:click="closeEditor()" class="w-10 h-10 px-1 py-1 mb-5 colorR ctext"><img src="{{asset('/icons/cross.svg')}}" class='w-6 h-6 bg-cover fill-white'></button>
        </div>

        @if (session()->has('edit-info'))              
            <div class="grid h-10 grid-cols-9 mt-1 mb-1 bg-green-300">   
                <p class="col-span-9 ctext text-green-950">Обновлено</p>
            </div>
        @endif

        <form wire:submit.prevent="editOrCreate()">
            <div class="grid">
                <div class="grid grid-cols-6 mb-1">
                    <label class="myLabel">Название роли</label>
                    <input class='col-span-5 input' type="text" min="1" placeholder="accountant" wire:model.live="form.name">
                </div>
                @error('form.name') <div class="text-red-600 text-end">{{$message}}</div> @enderror
            </div>
        
            <div>
                @php($i = 0)
                <div class='grid grid-cols-4 gap-x-2'> 
                    @foreach ($form->permissions as $name => $value)
                    
                        <div class="h-10 mt-1 mb-1 space-x-0.5 flex grid-col-1">
                            <div  class="w-full ctext colorA3 borderC"> 
                                <p class="text-black">{{$name}}</p>
                            </div> 
                            <input class='w-10 h-10 input' type="checkbox" wire:model.live='form.permissions.{{$name}}'>
                        </div>   

                        @php($i = $i + 1)    
                    @endforeach
                </div> 
            </div>

            <div class="grid grid-cols-4 gap-1 mt-5">
                @if ($id == null)
                    <button type="submit" class="col-start-4 btn colorA2">Создать</button>
                @else
                    @can('роли (редактирование)')
                        <button type="submit" class="col-start-4 btn colorA2">Изменить</button>
                    @endcan
                @endif
            </div>
        </form>
    @endif
</div>
