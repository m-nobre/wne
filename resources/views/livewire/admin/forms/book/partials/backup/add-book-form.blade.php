<div>
    @push('head')
        <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
    @endpush
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div class="px-6 py-4">
        
            <span class="block mb-6 text-xl">
                Adicionar Livro Novo
            </span>

        <form>
            <div class="my-3">
                <x-label for="title" class="custom-label" value="{{ __('Title') }}" />
                <x-input id="title" class="block mt-1 w-full" type="text" name="title" wire:model.live.debounce.1000ms="title" required />
            </div>

            <div class="mb-3">
                <x-label for="subtitle" class="custom-label" value="{{ __('Subtitle') }}" />
                <x-input id="subtitle" class="block mt-1 w-full" type="text" name="subtitle" wire:model.live.debounce.1000ms="subtitle" />
            </div>

            <div class="mb-3">
                <x-label for="description" class="custom-label" value="{{ __('Description') }}" />
                <textarea id="description" wire:model.live.debounce.1000ms="description" rows="3" class="border-gray-300 w-full dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" required></textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2">
                <div class="mb-3">
                    <x-label for="cover_image" value="{{ __('Cover Image') }}" />

                    <div class="w-full relative border-2 border-gray-300 border-dashed rounded-lg p-6 mt-1"
                        id="dropzone">
                        <input type="file" class="absolute inset-0 w-full h-full opacity-0 z-50"
                            wire:model.live.debounce.1000ms="cover_image" />
                        <div class="text-center">
                            <img class="mx-auto h-12 w-12" src="https://www.svgrepo.com/show/357902/image-upload.svg"
                                alt="">

                            <h3 class="mt-2 text-sm font-medium text-gray-900">
                                <label for="file-upload" class="relative cursor-pointer">
                                    <span>Drag and drop</span>
                                    <span class="text-indigo-600"> or browse</span>
                                    <span>to upload</span>
                                    <input id="file-upload" name="file-upload" type="file" class="sr-only">
                                </label>
                            </h3>
                            <p class="mt-1 text-xs text-gray-500">
                                PNG, JPG, GIF up to 10MB
                            </p>
                        </div>
                        @if ($cover_image)
                            <div class="auto-cols-auto w-full m-auto">
                                <img class="m-auto mt-2"style="max-height:200px;"
                                    src="{{ $cover_image->temporaryUrl() }}">
                            </div>
                        @endif

                    </div>
                    <div class="w-full px-1 m-0">
                        <button type="button" wire:click="savePhoto" class="w-full py-2 px-4 bg-indigo-500 text-white font-semibold rounded-full shadow-md hover:bg-violet-700 focus:outline-none focus:ring focus:ring-violet-400 focus:ring-opacity-75 disabled:bg-slate-50 disabled:text-slate-300 disabled:border-slate-200 rounded-t-lg " {{!empty($cover_image) ? '' : 'disabled'}}>Save</button>
                    </div>

                </div>
                <div class="my-3 mx-3 grid grid-cols-2 gap-3 lg:grid-cols-3 md:grid-cols-2 content-start ">
                    <div class="mb-3">
                        <x-label for="publish_date" class="custom-label" value="{{ __('Publish Date') }}" />
                        <input type="date" id="publish_date" name="publish_date" wire:model.live.debounce.1000ms="publish_date"
                            class="w-full mt-1 bg-transparent placeholder:text-slate-400 text-slate-600 text-sm border border-slate-200 rounded-md transition duration-300 ease focus:outline-none focus:ring-blue-500 hover:border-blue-300 shadow-sm focus:shadow" />
                    </div>
                {{-- LANGUAGE --}}
                        <div class="mb-3">
                            <div class="flex justify-between">
                                <div class="flex items-end">
                                    <label for="language_id" class="block text-sm font-medium text-gray-700 mb-1 custom-label">{{ __('Language') }}</label>
                                </div>
                                <div class="icons flex items-end px-1">

                                    @livewire('custom.modal-button', ['model' => 'Language', 'element' => 'language_id' ,'view' => 'admin.forms.book.partials.create-name-desc-entity', 'type' => 'livewire', 'icon' => 'bi-plus-square', 'colour' => 'limegreen'], key('language_modal_button')) {{-- https://icons.getbootstrap.com/ --}}
                                    
                                </div>
                            </div>
                            <select name="language_id" id="language_id" data-id="Language"
                                wire:model.live.debounce.1000ms="language_id"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="">{{ __('Select an Option') }}</option>

                                @foreach ($languages as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach


                            </select>
                        </div>
                {{-- PUBLICATION STATUS --}}
                    <div class="mb-3">
                        <div class="flex justify-between">
                            <div class="flex items-end">
                                <label for="publication_status_id" class="block text-sm font-medium text-gray-700 mb-1 custom-label">{{ __('Publication Status') }}</label>
                            </div>
                            <div class="icons flex items-end px-1">

                                @livewire('custom.modal-button', ['model' => 'PublicationStatus', 'element' => 'publication_status_id' ,'view' => 'admin.forms.book.partials.create-name-desc-entity', 'type' => 'livewire', 'icon' => 'bi-plus-square', 'colour' => 'limegreen'], key('publication_status_modal_button')) {{-- https://icons.getbootstrap.com/ --}}
                                  
                            </div>
                        </div>

                        <select name="publication_status_id" id="publication_status_id" data-id="PublicationStatus"
                            wire:model.live.debounce.1000ms="publication_status_id"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">{{ __('Select an Option') }}</option>


                            @foreach ($publication_statuses as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach


                        </select>
                    </div>
                {{-- MEDIA TYPES --}}
                    @if ($media_types)                        
                        <div class="mb-3">
                            <div class="flex justify-between">
                                <div class="flex items-end">
                                    <label for="media_type_id" class="block text-sm ml-1 font-medium text-gray-700 mb-1 custom-label">{{ __('Media Type') }}</label>
                                </div>
                                <div class="icons flex items-end px-1">

                                    @livewire('custom.modal-button', ['model' => 'MediaType', 'element' => 'media_type_id' ,'view' => 'admin.forms.book.partials.create-name-desc-entity', 'type' => 'livewire', 'icon' => 'bi-plus-square', 'colour' => 'limegreen'], key('media_type_modal_button')) {{-- https://icons.getbootstrap.com/ --}}
                                      
                                </div>
                            </div>

                            <select name="media_type_id" id="media_type_id" wire:model.live.debounce.1000ms="media_type_id" 
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" data-id="MediaType">

                                <option value="">{{ __('Select an Option') }}</option>

                                @foreach ($media_types as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach


                            </select>
                        </div>
                    @endif
                {{-- PEOPLE --}}
                    
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
                {{-- GENRE --}}
                    <div class="mb-3">
                        <div class="flex justify-between">
                            <div class="flex items-end">
                                <label for="genre_id" class="block text-sm font-medium text-gray-700 mb-1">{{ __('Genre') }}</label>
                            </div>
                            <div class="icons flex items-end px-1">

                                @livewire('custom.modal-button', ['model' => 'Genre', 'element' => 'genre_id' ,'view' => 'admin.forms.book.partials.create-name-desc-entity', 'type' => 'livewire', 'icon' => 'bi-plus-square', 'colour' => 'limegreen']) {{-- https://icons.getbootstrap.com/ --}}
                                
                            </div>
                        </div>
                        <select name="genre_id" id="genre_id" data-id="Genre" wire:model.live.debounce.1000ms="genre_id" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">{{ __('Select an Option') }}</option>

                            @foreach ($genres as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach


                        </select>
                    </div>

                </div>
                <div class="inline-flex mb-3 items-center rounded-md px-2 py-1 text-xs font-medium text-indigo-700 ring-1 ring-inset ring-indigo-700/10">
                    <div class="mb-3">
                        <x-label for="additional_authors_input" class="custom-label" value="{{ __('Additonal Authors') }}" />
                        @livewire('admin.additional-authors-input', ['model' => 'author', 'list_name' => "additional_authors_input"])
                    </div>
                    @if (!empty($additional_authors))
                        @foreach ($additional_authors as $id => $value)

                            <x-random-colour-badge :value="$value" />
                
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="p-3">
                <div class="relative grow grid grid-cols-1 md:grid-cols-1 wrap mb-3">
                    
                    <div class="grow grid w-full grid-cols-3 gap-3 lg:grid-cols-3 md:grid-cols-2">
                        
                        <div>
    
                            <x-label for="keywords" class="custom-label" value="{{ __('Keywords') }}" />
                            <div class="relative flex h-10 w-full min-w-full max-w-full">
                                <button
                                    class="!absolute right-1 top-1 z-10 select-none rounded bg-indigo-500 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-indigo-500/20 transition-all hover:shadow-lg hover:shadow-indigo-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none peer-placeholder-shown:pointer-events-none peer-placeholder-shown:bg-blue-gray-500 peer-placeholder-shown:opacity-50 peer-placeholder-shown:shadow-none"
                                    type="button" data-ripple-light="true"
                                    wire:click="addKeyword">
                                    {{ __('Add') }}
                                </button>
                                <input type="text"
                                    class="peer h-full w-full rounded-[7px] border border-gray-300 bg-transparent px-3 py-2.5 pr-20 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 focus:border-2 focus:border-indigo-500 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50"
                                    placeholder=" " wire:model="keyword"  data-id="Keyword"/>
        
                            </div>
                        </div>
                        @if ($keywords)
                            <div
                                class="flex flex-row flex-wrap col-span-2 gap-1 content-center mb-3">
              
                            
                              @foreach ($keywords as $id => $value)
    
                                <div class="max-h-10 m-0 p-0">
                                    <x-random-colour-badge :value="$value" />
                                </div>
        
                        
                                @endforeach
       
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="relative inline-block m-1 p-1 w-full overflow-visible text-wrap">
                @if ($book)
                    <pre class="inline-block m-1 p-1 w-full overflow-visible text-wrap">
                        {{str_replace("{", "\n", str_replace(",", "\n", json_encode($book)))}}
                    </pre>
                @endif
            </div>
            <button type="submit" wire:click="save" class="w-full py-2 px-5 bg-indigo-500 text-white font-semibold rounded-full shadow-md hover:bg-violet-700 focus:outline-none focus:ring focus:ring-violet-400 focus:ring-opacity-75 ">Save</button>
        </form>
        <script>
            const quill = new Quill('#description', {
                theme: 'snow'
            });
        </script>
        <script>
            document.addEventListener('livewire:init', () => {
               Livewire.on('new-entity', (data) => {
                    console.log(JSON.parse(data));
                   setTimeout(function(){
                       $('select[data-id="'+type['type'].trim()+'"] option:last-child').attr('selected', 'selected');
                   }, 600);                    
               });
            });
        </script>
    </div>
</div>
