<div>
    {{-- Do your work, then step back. --}}

            {{-- NORMAL TEXT INPUTS --}}
            <div class="my-3">
                <x-label for="form-title-{{$key}}" class="custom-label" value="{{ __('Title') }}" />
                <x-input id="form-title-{{$key}}" value="{{$book->title}}" class="block mt-1 w-full" type="text" name="form-title-{{$key}}"  wire:model.live.debounce.1000ms="title"/>
            </div>
            <div class="my-3">
                <x-label for="form-subtitle-{{$key}}" class="custom-label" value="{{ __('Subtitle') }}" />
                <x-input id="form-subtitle-{{$key}}" class="block mt-1 w-full" type="text" name="form-subtitle-{{$key}}" wire:model.live.debounce.1000ms="subtitle"/>
            </div>
</div>
