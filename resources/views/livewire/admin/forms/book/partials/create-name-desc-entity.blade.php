<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <div class="w-full m-auto mb-3">
        <h3>New {{$model}}</h3>
    </div>
    <div class="mb-3">
        <x-label for="name" class="custom-label" value="{{ __('Name') }}" />
        <x-input id="name" class="block mt-1 w-full" type="text" name="name"  wire:model="name"/>
    </div>
    <div class="mb-3">
        <x-label for="description" class="custom-label" value="{{ __('Description') }}" />
        <x-input id="description" class="block mt-1 w-full" type="text" name="description"  wire:model="description"/>
    </div>
    <div class="mb-3">        
        <button type="button" wire:click="save" class="w-full py-2 px-5 bg-indigo-500 text-white font-semibold rounded-full shadow-md hover:bg-violet-700 focus:outline-none focus:ring focus:ring-violet-400 focus:ring-opacity-75">Save</button>
    </div>
</div>
