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

            .selected-row {
                background-color: rgb(236, 236, 236);
            }

        </style>
    @endpush
    <div class="px-6 py-4 grid grid-cols-2 gap-3">
        <div class="bg-white p-3 rounded-2xl shadow-sm">
            @livewire('admin.forms.book.main-info', ['book' => $book, 'key' => $key])

            @livewire('admin.forms.book.description', ['book' => $book, 'key' => $key])
        </div>
        <div class="bg-white p-3 rounded-2xl shadow-sm">
            @livewire('admin.forms.book.additional-info', ['book' => $book, 'key' => $key])
        </div>
        <div class="bg-white p-3 rounded-2xl shadow-sm">
            @livewire('admin.forms.book.people-info', ['book' => $book, 'key' => $key])
        </div>
        <div class="bg-white p-3 rounded-2xl shadow-sm">
            @livewire('admin.forms.book.cover-image', ['book' => $book, 'key' => $key])
        </div>
        <div class="bg-white p-3 col-span-2 rounded-2xl shadow-sm">
            @livewire('admin.forms.book.tag-author-info', ['book' => $book, 'key' => $key])
        </div>
    </div>

    <div>
        <button 
        class="w-full z-10 select-none rounded bg-indigo-500 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-indigo-500/20 transition-all hover:shadow-lg hover:shadow-indigo-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none peer-placeholder-shown:pointer-events-none peer-placeholder-shown:bg-blue-gray-500 peer-placeholder-shown:opacity-50 peer-placeholder-shown:shadow-none disabled:bg-slate-50 disabled:text-slate-300 disabled:border-slate-200 " 
            type="button" 
            data-ripple-light="true"
            wire:click="saveBook" >
        
            {{ __('Publish') }}
        
        </button>
    </div>
    @script
        <script>
            Livewire.on('edit-book', book_id => {
                // console.log($("tr[data-id*='1010']").find(".id-text"))
                // $(`tr[data-id*='${id.book_id}']`).find('.id-text').prepend("<i class='bi bi-caret-right-fill temp-caret'></i>");
                // $("tr[data-id*='1010']").find(".id-text").prepend("<i class='bi bi-caret-right-fill mr-3'></i>")
                $("tr[data-id='1010']").find(".id-text").addClass("selected-row")
                $("tr[data-id*='1010']").find(".id-text").prepend("<i class='bi bi-caret-right-fill mr-3'></i>")
            })

        </script>
    @endscript
    @push('scripts')
        <script>
            $(function(){
                $(".tox-statusbar__branding").hide();
                $("tr[data-id*='{{$book->id}}']").find('.id-text').prepend("<i class='bi bi-caret-right-fill temp-caret'></i>");
                window.addEventListener('edit-book', event => {
                    // alert('Name updated to: ' + event.detail);
                    console.log($("tr[data-id*='"+event.detail.book_id+"']"));
                    $("tr[data-id*='"+event.detail.book_id+"']").remove()
                    $(".hide-on-edit").remove()
                    // $("tr[data-id*='"+event.detail.book_id+"']").find(".id-text").prepend("<i class='bi bi-caret-right-fill mr-3'></i>")
                    

                })

            });
        </script>
    @endpush

</div>
