<div>
    {{-- Success is as dangerous as failure. --}}
    @push('head')
        <style>
            .custom-label {
                font-style: italic;
                color: gray;
                font-size: 1em;
                margin-top: 6px;
                margin-bottom: 3px;

            }
        </style>
    @endpush
    {{-- @json($book) --}}
    <div class="px-6 py-4 grid grid-cols-2 gap-6">
        <div class="bg-white p-3 rounded-2xl shadow-md">
            @livewire('admin.forms.book.main-info', ['book' => $book, 'key' => $key])
        </div>
        <div class="bg-white p-3 rounded-2xl shadow-md">
            @livewire('admin.forms.book.cover-image', ['book' => $book, 'key' => $key])
        </div>
        <div class="bg-white p-3 rounded-2xl shadow-md">
            @livewire('admin.forms.book.description', ['book' => $book, 'key' => $key])
        </div>
        <div class="bg-white p-3 rounded-2xl shadow-md">
            @livewire('admin.forms.book.additional-info', ['book' => $book, 'key' => $key])
        </div>
        <div class="bg-white p-3 rounded-2xl shadow-md">
            @livewire('admin.forms.book.people-info', ['book' => $book, 'key' => $key])
        </div>
        <div class="bg-white p-3 rounded-2xl shadow-md">
            @livewire('admin.forms.book.tag-author-info', ['book' => $book, 'key' => $key])
        </div>
    </div>
        
   
</div>
