<div class="grid grid-cols-7 gap-3">
    {{-- Care about people's approval and you will be their prisoner. --}}
    <div class="col-span-5">
        @livewire('admin.forms.book',  ['book_id' => $book->id ?? NULL])
    </div>
    <div class="col-span-2 bg-neutral-50 rounded-xl">
        @livewire('admin.forms.book.partials.book-delete')
    </div>
    
</div>
