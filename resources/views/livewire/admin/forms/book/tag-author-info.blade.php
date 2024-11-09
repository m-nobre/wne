<div class="grid grid-cols-2 gap-4">
    {{-- The whole world belongs to you. --}}
    <div  class="mb-3">
        <x-label for="additionalAuthorInput" class="custom-label" value="{{ __('Additional Authors') }}" />
        @livewire('admin.forms.book.partials.additional-authors', ['book' => $book])
    </div>
    <div  class="mb-3">
        <x-label for="keywordsInput" class="custom-label" value="{{ __('Keywords') }}" />
        @livewire('admin.forms.book.partials.add-keyword', ['book' => $book])
    </div>
</div>
