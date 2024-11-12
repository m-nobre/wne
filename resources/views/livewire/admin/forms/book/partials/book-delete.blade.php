<div >
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <div class="relative flex flex-col w-full h-full text-gray-700 bg-white shadow-md rounded-lg bg-clip-border ">
        <table class="w-full text-left table-auto min-w-max  ">
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
                    Published
                  </p>
                </th>
                <th class="p-4 border-b border-slate-300 bg-slate-50">
                  <p class="block text-sm font-normal leading-none text-slate-500">
                    Options
                  </p>
                </th>
              </tr>
            </thead>
            <tbody>
              @foreach ($books as $book)             
                <tr class="hover:bg-slate-50" data-id="{{ $book->id }}" >
                    <td class="p-4 border-b border-slate-200">
                    <p class="block text-sm text-slate-800 id-text">
                      {!! ($editing_book == $book->id && !$first_run) ? '<i class="bi bi-caret-right-fill temp-caret"></i>' : '' !!}
                        {{ $book->id }}
                    </p>
                    </td>
                    <td class="p-4 border-b border-slate-200">
                    <p class="block text-sm text-slate-800">
                        {{ $book->title }}
                    </p>
                    </td>
                    <td class="p-4 border-b border-slate-200 " >
                      
                      <i class="bi text-{{$book->key ? 'gray' : 'emerald'}}-400 bi-check-circle-fill"></i>


                    </td>
                    <td class="object-fit border-b border-slate-200 flex flex-row class="box-content	" ">
                      <a href="#" class="object-contain	object-center	px-1 mx-1" 
                      wire:click="hideBook({{ $book->id }})">
                      <i class="bi bi-eye-slash-fill"  class="object-contain	" ></i>
                      </a>
                      @if ($editing_book <> $book->id)
                          
                      <a href="#" class="object-contain	object-center	px-1 mx-1 hide-on-edit" 
                      wire:click="editBook({{ $book->id }})">
                      <i class="bi bi-pencil-square"  class="object-contain	" ></i>
                      </a>
                      <a href="#" class="object-contain	object-center	hide-on-edit"   
                        wire:click="deleteBook({{ $book->id }})"
                        wire:confirm="Are you sure you want to delete this book?">
                          <i class="bi bi-trash-fill" class="object-contain	" ></i>

                        </a>
                      @endif


                    </td>
                </tr>
              @endforeach
            </tbody>
          </table>

      </div>
       
</div>
