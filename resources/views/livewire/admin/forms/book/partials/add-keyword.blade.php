<div class="grid gap-3 align-top  shadow-md p-3 rounded-xl">
    {{-- Success is as dangerous as failure. --}}
    <div class="grid grid-cols-4 grid-rows-1 gap-3">
        <div class="space-y-8 divide-y col-span-3 divide-gray-200">
            <input 
                type="text"
                wire:model.live.debounce.1000ms="new_keyword"
                class="border-gray-300 w-full dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                {{-- x-on:change.debounce="additionalAuthorSelected($event)" --}}
            >
            {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
        </div>
        <button type="button" class="select-none rounded bg-indigo-500 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-indigo-500/20 transition-all hover:shadow-lg hover:shadow-indigo-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none peer-placeholder-shown:pointer-events-none peer-placeholder-shown:bg-blue-gray-500 peer-placeholder-shown:opacity-50 peer-placeholder-shown:shadow-none disabled:bg-slate-50 disabled:text-slate-300 disabled:border-slate-200" wire:click="addKeyword"  {{!$verified ? 'disabled' : ''}}>
                {{__('Add')}}
        </button>
    </div>
    @if (!empty($keywords))
    <div class="flex w-full">

        <div class="flex flex-row justify-end gap-2 flex-wrap pt-3">
            @foreach ($keywords as $id => $value)
                <div class="max-h-16 text-center object-contain flex-wrap">
                    <x-random-colour-badge :value="$value" :color="Tools::RandomColour()" />
                </div>

            @endforeach
            <hr/>
        </div>
    </div>
    @endif
</div>
