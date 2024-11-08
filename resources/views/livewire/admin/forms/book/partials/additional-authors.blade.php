<div class="relative grid gap-3 flex-nowrap shadow-md p-3 rounded-xl">
    {{-- Success is as dangerous as failure. --}}
    <div class="grid grid-cols-4 grid-rows-1 gap-3">
        <div class="space-y-8 divide-y col-span-3 divide-gray-200"
            x-data='{
                additionalAuthorSelected(e) {
                    let value = e.target.value
                    let id = document.body.querySelector("#additionalAuthorsList [value=\""+value+"\"]").dataset.value
            
                    $wire.dispatch("additionalAuthorSelected", { id: id });
                    console.log(id);
                    
                    
    
    
                    // todo: Do something interesting with this
                }
            }'
            >
            <input
                type="text"
                list="additionalAuthorsList"
                wire:model.live.debounce.1000ms="additionalAuthorName"
                class="border-gray-300 w-full dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                x-on:change.debounce="additionalAuthorSelected($event)"
            >
            @if ($newPerson)
                <a href="#" wire:click.prevent="savePerson"><h6>New Author found, please click here to save </h6></a>
            @endif
    
    
    
            <datalist id="additionalAuthorsList">
                @foreach($searchResults as $id => $name)
                    <option
                        wire:key="{{ $id }}"
                        data-value="{{ $id }}"
                        value="{{ $name }}"
                    ></option>
                @endforeach
            </datalist>
            {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
        </div>
        <button type="button" class="select-none rounded bg-indigo-500 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-indigo-500/20 transition-all hover:shadow-lg hover:shadow-indigo-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none peer-placeholder-shown:pointer-events-none peer-placeholder-shown:bg-blue-gray-500 peer-placeholder-shown:opacity-50 peer-placeholder-shown:shadow-none disabled:bg-slate-50 disabled:text-slate-300 disabled:border-slate-200" wire:click="addAdditionalAuthor" {{!$verified ? 'disabled' : ''}}>{{__('Add')}}</button>
    </div>
    @if (!empty($additional_authors))
        <div class="flex flex-row justify-start gap-2 flex-wrap pt-3">
            @foreach ($additional_authors as $id => $value)
                <div class="max-h-16 text-center object-contain flex-wrap">
                    <x-random-colour-badge :value="$value" :color="Tools::RandomColour()" />
                </div>

            @endforeach
        </div>
    @endif
</div>
