<div>
    {{-- Stop trying to control. --}}
    <div class="mb-3">
        <x-label for="publisher_id" class="custom-label" value="{{ __('Publisher') }}" />
        @livewire('admin.person-input', ['model' => 'publisher'], key('publisher'))
    </div>
    <div class="mb-3">
        <x-label for="translator_id" class="custom-label" value="{{ __('Translator') }}" />
        @livewire('admin.person-input', ['model' => 'translator'], key('translator'))
    </div>
    <div class="mb-3">
        <x-label for="editor_id" class="custom-label" value="{{ __('Editor') }}" />
        @livewire('admin.person-input', ['model' => 'editor'], key('editor'))
    </div>
    <div class="mb-3">
        <x-label for="illustrator_id" class="custom-label" value="{{ __('Illustrator') }}" />
        @livewire('admin.person-input', ['model' => 'illustrator'], key('illustrator'))
    </div>
    <div class="mb-3">
        <x-label for="author_id" class="custom-label" value="{{ __('Author') }}" />
        @livewire('admin.person-input', ['model' => 'author'], key('author'))
    </div>
</div>
