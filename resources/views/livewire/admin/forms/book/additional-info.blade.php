<div>
    {{-- The whole world belongs to you. --}}
    <div class="mb-3">
        <x-label for="publish_date" class="custom-label" value="{{ __('Publish Date') }}" />
        <input type="datetime-local" id="publish_date" name="publish_date" 
            wire:model.live.debounce.1000ms="publish_date" 
            value="{{ $publish_date }}" 
            min="{{Carbon\Carbon::now()->subDays(30)->format('Y-m-d\TH:i')}}"
            max="{{Carbon\Carbon::now()->addDays(30)->format('Y-m-d\TH:i')}}"
            class="w-full mt-1 bg-transparent placeholder:text-slate-400 text-slate-600 text-sm border border-slate-200 rounded-md transition duration-300 ease focus:outline-none focus:ring-blue-500 hover:border-blue-300 shadow-sm focus:shadow" />
    </div>
    <div class="mb-3">
        <div class="flex justify-between">
            <div class="flex items-end">
                <label for="language_id" class="block text-sm font-medium text-gray-700 mb-1 custom-label">{{ __('Language') }}</label>
            </div>
            <div class="icons flex items-end px-1">

                @livewire('custom.modal-button', ['model' => 'Language', 'element' => 'language_id' ,'view' => 'admin.forms.book.partials.create-name-desc-entity', 'type' => 'livewire', 'icon' => 'bi-plus-square', 'colour' => 'limegreen'], key('language_modal_button')) {{-- https://icons.getbootstrap.com/ --}}
                
            </div>
        </div>
        <select name="language_id" id="language_id" data-id="Language"
            wire:model.live.debounce.1000ms="language_id"
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option value="">{{ __('Select an Option') }}</option>

            @foreach ($languages as $item)
                <option value="{{$item->id}}" {{$item->id == $language_id ? 'selected' : ''}}>{{$item->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <div class="flex justify-between">
            <div class="flex items-end">
                <label for="publication_status_id" class="block text-sm font-medium text-gray-700 mb-1 custom-label">{{ __('Publication Status') }}</label>
            </div>
            <div class="icons flex items-end px-1">

                @livewire('custom.modal-button', ['model' => 'PublicationStatus', 'element' => 'publication_status_id' ,'view' => 'admin.forms.book.partials.create-name-desc-entity', 'type' => 'livewire', 'icon' => 'bi-plus-square', 'colour' => 'limegreen'], key('publication_status_modal_button')) {{-- https://icons.getbootstrap.com/ --}}
                  
            </div>
        </div>

        <select name="publication_status_id" id="publication_status_id" data-id="PublicationStatus"
            wire:model.live.debounce.1000ms="publication_status_id"
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option value="">{{ __('Select an Option') }}</option>


            @foreach ($publication_statuses as $item)
                <option value="{{$item->id}}" {{$item->id == $publication_status_id ? 'selected' : ''}}>{{$item->name}}</option>
            @endforeach


        </select>
    </div>
    <div class="container mx-auto px-20">


</div>
    @if ($media_types)                        
        <div class="mb-3">
            <div class="flex justify-between">
                <div class="flex items-end">
                    <label for="media_type_id" class="block text-sm ml-1 font-medium text-gray-700 mb-1 custom-label">{{ __('Media Type') }}</label>
                </div>
                <div class="icons flex items-end px-1">
    
                    @livewire('custom.modal-button', ['model' => 'MediaType', 'element' => 'media_type_id' ,'view' => 'admin.forms.book.partials.create-name-desc-entity', 'type' => 'livewire', 'icon' => 'bi-plus-square', 'colour' => 'limegreen'], key('media_type_modal_button')) {{-- https://icons.getbootstrap.com/ --}}
                    
                </div>
            </div>
    
            <select name="media_type_id" id="media_type_id" wire:model.live.debounce.1000ms="media_type_id" 
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" data-id="MediaType">
    
                <option value="">{{ __('Select an Option') }}</option>
    
                @foreach ($media_types as $item)
                    <option value="{{$item->id}}" {{$item->id == $media_type_id ? 'selected' : ''}}>{{$item->name}}</option>
                @endforeach
    
    
            </select>
        </div>
    @endif
    <div class="mb-3">
        <div class="flex justify-between">
            <div class="flex items-end">
                <label for="genre_id" class="block text-sm font-medium text-gray-700 mb-1 custom-label">{{ __('Genre') }}</label>
            </div>
            <div class="icons flex items-end px-1">

                @livewire('custom.modal-button', ['model' => 'Genre', 'element' => 'genre_id' ,'view' => 'admin.forms.book.partials.create-name-desc-entity', 'type' => 'livewire', 'icon' => 'bi-plus-square', 'colour' => 'limegreen']) {{-- https://icons.getbootstrap.com/ --}}
                
            </div>
        </div>
        <select name="genre_id" id="genre_id" data-id="Genre" wire:model.live.debounce.1000ms="genre_id" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option value="">{{ __('Select an Option') }}</option>

            @foreach ($genres as $item)
                <option value="{{$item->id}}" {{$item->id == $genre_id ? 'selected' : ''}}>{{$item->name}}</option>
            @endforeach


        </select>
    </div>
    <div class="grid grid-cols-2 gap-3 w-full">
        <div class="mb-3">
            <div>
                <x-label for="form-isbn-{{$key}}" class="custom-label" value="{{ __('ISBN') }}" />
                <x-input id="form-isbn-{{$key}}" class="block mt-1 w-full" type="text" name="form-isbn-{{$key}}" wire:model.live.debounce.1000ms="isbn"/>
            </div>
        </div>
        <div class="mb-3">
            <div>
                <x-label for="form-isbn13-{{$key}}" class="custom-label" value="{{ __('ISBN 13') }}" />
                <x-input id="form-isbn13-{{$key}}" class="block mt-1 w-full" type="text" name="form-isbn13-{{$key}}"  wire:model.live.debounce.1000ms="isbn13"/>
            </div>

        </div>
    </div>

</div>