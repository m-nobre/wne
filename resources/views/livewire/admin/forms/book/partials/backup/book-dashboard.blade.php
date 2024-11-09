<div>
    {{-- Be like water. --}}
    <div x-data="init()">
        {{-- Be like water. --}}
        <div id="header-{{$key}}">
            <div id="header-title-{{$key}}" class="pl-6 p-1 my-3 text-xl">
                {{__('Book Dashboard')}}
            </div>
            <div id="book-form-{{$key}}" class="pl-6 p-1 my-3">
                @livewire('admin.forms.book.main-info', ['book' => $book ?? new \App\Models\Book::class], key($user_id))
            </div>
        </div>
    </div>
    @push('scripts')
    <script>

        function init() {
      
          return {
            book: "",
            setBook: function (book) {
              this.book = book;
            },
          };
        }
      
      </script>
    @endpush
</div>
