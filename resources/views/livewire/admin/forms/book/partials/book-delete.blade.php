<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <div class="relative flex flex-col w-full h-full text-gray-700 bg-white shadow-md rounded-lg bg-clip-border">
        <table class="w-full text-left table-auto min-w-max">
            <thead>
              <tr>
                <th class="p-4 border-b border-slate-300 bg-slate-50">
                  <p class="block text-sm font-normal leading-none text-slate-500">
                    ID
                  </p>
                </th>
                <th class="p-4 border-b border-slate-300 bg-slate-50">
                  <p class="block text-sm font-normal leading-none text-slate-500">
                    Title
                  </p>
                </th>
                <th class="p-4 border-b border-slate-300 bg-slate-50">
                  <p class="block text-sm font-normal leading-none text-slate-500">
                    Delete
                  </p>
                </th>
              </tr>
            </thead>
            <tbody>
              @foreach ($books as $book)             
                <tr class="hover:bg-slate-50">
                    <td class="p-4 border-b border-slate-200">
                    <p class="block text-sm text-slate-800">
                        {{ $book->id }}
                    </p>
                    </td>
                    <td class="p-4 border-b border-slate-200">
                    <p class="block text-sm text-slate-800">
                        {{ $book->title }}
                    </p>
                    </td>
                    <td class="p-4 border-b border-slate-200">
                        <a href="#"  
                        wire:click="deleteBook({{ $book->id }})"
                        wire:confirm="Are you sure you want to delete this book?" 
                        class="block text-sm font-semibold text-slate-800">
                        Delete
                        </a>
                    </td>
                </tr>
              @endforeach
            </tbody>
          </table>

      </div>
       
</div>
