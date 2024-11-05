<div>
    {{-- The whole world belongs to you. --}}
    <div  class="mb-3">
        <x-label for="additionalAuthorInput" class="custom-label" value="{{ __('Additional Authors') }}" />
        @livewire('admin.forms.book.partials.additional-authors', ['book' => $book], key(Auth::id()))
    </div>
    <div  class="my-3">
        <x-label for="keywordsInput" class="custom-label" value="{{ __('Keywords') }}" />
        @livewire('admin.forms.book.partials.add-keyword', ['book' => $book], key(Auth::id()))
    </div>
</div>
