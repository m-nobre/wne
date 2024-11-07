<div>
    {{-- Stop trying to control. --}}
    <div class="mb-3">
        <x-label for="publisher_id" class="custom-label" value="{{ __('Publisher') }}" />
        @livewire('admin.forms.book.partials.person-input', [ "book" => $book, 'model' => 'publisher', 'old_value' => "publisher_id.{$book->publisher_id}"], key('publisher'))
    </div>
    <div class="mb-3">
        <x-label for="translator_id" class="custom-label" value="{{ __('Translator') }}" />
        @livewire('admin.forms.book.partials.person-input', [ "book" => $book, 'model' => 'translator', 'old_value' => "translator_id.{$book->translator_id}"], key('translator'))
    </div>
    <div class="mb-3">
        <x-label for="editor_id" class="custom-label" value="{{ __('Editor') }}" />
        @livewire('admin.forms.book.partials.person-input', [ "book" => $book, 'model' => 'editor', 'old_value' => "editor_id.{$book->editor_id}"], key('editor'))
    </div>
    <div class="mb-3">
        <x-label for="illustrator_id" class="custom-label" value="{{ __('Illustrator') }}" />
        @livewire('admin.forms.book.partials.person-input', [ "book" => $book, 'model' => 'illustrator', 'old_value' => "illustrator_id.{$book->illustrator_id}"], key('illustrator'))
    </div>
    <div class="mb-3">
        <x-label for="author_id" class="custom-label" value="{{ __('Author') }}" />
        @livewire('admin.forms.book.partials.person-input', [ "book" => $book, 'model' => 'author', 'old_value' => "author_id.{$book->author_id}"], key('author'))
    </div>
</div>
