<div class="space-y-8 divide-y divide-gray-200"
x-data='{
    {{ucfirst($model)}}nameSelected(e) {
        let value = e.target.value
        var $dvElement = $("#{{ucfirst($model)}}nameOptions");
        if (!$.isEmptyObject($dvElement)) 
        {
            let id = document.body.querySelector("#{{ucfirst($model)}}nameOptions [value=\""+value+"\"]").dataset.value
    
            $wire.dispatch("{{$model}}-selected", { id: id });
            console.log(id);
        } 
        


        // todo: Do something interesting with this
    }
}'
>
    <input
        type="text"
        list="{{ucfirst($model)}}nameOptions"
        wire:model.live.debounce.1000ms="name"
        value="{{$name ?? ''}}"
        class="border-gray-300 w-full dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
        x-on:change.debounce="{{ucfirst($model)}}nameSelected($event)"
    >
    @if ($newPerson)
        <a href="#" wire:click.prevent="savePerson"><h6>New {{ucfirst($model)}} found, please click here to save </h6></a>
    @endif



    <datalist id="{{ucfirst($model)}}nameOptions">
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
