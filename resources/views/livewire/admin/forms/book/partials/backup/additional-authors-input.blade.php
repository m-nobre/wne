
{{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
<div class="relative flex h-10 w-full min-w-full max-w-full">
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <div>
        <button 
            class="!absolute right-1 top-1 z-10 select-none rounded bg-indigo-500 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-indigo-500/20 transition-all hover:shadow-lg hover:shadow-indigo-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none peer-placeholder-shown:pointer-events-none peer-placeholder-shown:bg-blue-gray-500 peer-placeholder-shown:opacity-50 peer-placeholder-shown:shadow-none disabled:bg-slate-50 disabled:text-slate-300 disabled:border-slate-200 " 
            type="button" 
            data-ripple-light="true"
            wire:click="jsonAdd" 
            {{$verified ? '' :  'disabled'}}
            >
        
            {{ __('Add') }}
        
        </button>
        
        <div class="space-y-8 divide-y divide-gray-200"
            x-data='{
                additionalAuthorSelected(e) {
                    console.log(e)
                    let value = e.target.value
                    let id = document.body.querySelector("#additionalAuthorOptions [value=\""+value+"\"]").dataset.value

                    $wire.dispatchSelf("additionalAuthorSelected", {author_id: id});

                    // todo: Do something interesting with this
                    console.log(id);
                }
            }'
            >
                <input
                    type="text"
                    list="additionalAuthorOptions"
                    id="additionalAuthorInput"
                    wire:model.live.debounce.1000ms="name"
                    class=" w-full border-gray-300 w-full dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                    x-on:change.debounce="additionalAuthorSelected($event)"
                >
                @if ($newPerson)
                    <a href="#" wire:click.prevent="savePerson"><h6>New {{ucfirst($model)}} found, please click here to save </h6></a>
                @endif



                <datalist id="additionalAuthorOptions">
                    @foreach($searchResults as $id => $name)
                        @if (!in_array($id, $list))
                            <option
                                wire:key="{{ $id }}"
                                data-value="{{ $id }}"
                                value="{{ $name }}"
                            ></option>
                            
                        @endif
                    @endforeach
                </datalist>
                {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
            </div>

    </div>
    {{-- @json($personId) --}}
</div>
