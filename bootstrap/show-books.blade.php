<div class="min-w-full">

        <style>
            .divider {
                border-width: 1px;
                border-top: 0px;
                border-left: 0px;
                border-right: 0px;
                border-image: linear-gradient(90deg, rgb(236, 228, 148), rgb(119, 98, 3)) 1;
            }
        </style>

    {{-- Care about people's approval and you will be their prisoner. --}}
    <div class="flex grid grid-cols-2 gap-4 w-full justify-between	min-w-full">
        @foreach ($books as $book)
            <div class="max-w-md mx-auto my-5 p-5 bg-white shadow-lg rounded-lg hover:shadow-xl transition-shadow duration-300">
                <div class="my-2 book-title rounded-lg -mt-2 p-2">
                    <h2 class="text-lg font-bold">Book Title</h2>
                    <div class="divider flex p-1 w-full bg-dark mb-3"> </div>
                    <h3 class="font-bold">{{$book->subtitle ?? ''}}</h3>

                </div>
                <div class="grid grid-cols-3 gap-3">
                    <!-- Left Column: Book Cover -->
                    <div class="relative shrink-1 ">
                        <img src="{{asset('storage/'.$book->cover_image)}}" alt="Book Cover" class="w-40 h-60 object-cover rounded-lg transition-transform duration-300 transform hover:scale-105" />
                        <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden hover:flex">
                            <span class="text-white text-xl">Zoomed</span>
                        </div>
                    </div>
                    <div class="mt-4 flex flex-col grow-1 col-span-2 ">
                        <div class="grid grid-cols-3">
                            <h3 class="text-sm text-gray-600">Autor:</h3>
                            <h2 class="text-md text-gray-500 col-span-2  text-center font-black	">{{$book->author->name ?? ''}}</h2>
                            <h3 class="text-md text-gray-600 col-span-3 my-3 font-black text-center">Contributors</h3>

                            <div class="flex w-full col-span-3">
                                <h3 class="text-md text-gray-600 baseline mx-3">Ilustrador:</h3>
                                <div class="relative group col-span-2 baseline">
                                    <span class="text-md text-blue-600 cursor-pointer hover:underline">{{$book->illustrator->name ?? ''}}</span>
                                    <div class="absolute left-0 w-48 mt-1 rounded-lg shadow-lg bg-white p-3 text-sm text-gray-800 hidden group-hover:block z-90">
                                        <img src="https://via.placeholder.com/50" alt="Contributor" class="w-12 h-12 rounded-full">
                                        <p>Bio of {{$book->illustrator->name ?? ''}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="flex w-full col-span-3">
                                <h3 class="text-md text-gray-600 baseline mx-3">Tradução:</h3>
                                <div class="relative group col-span-2 baseline">
                                    <span class="text-md text-blue-600 cursor-pointer hover:underline">{{$book->translator->name ?? ''}}</span>
                                    <div class="absolute left-0 w-48 mt-1 rounded-lg shadow-lg bg-white p-3 text-sm text-gray-800 hidden group-hover:block z-90">
                                        <img src="https://via.placeholder.com/50" alt="Contributor" class="w-12 h-12 rounded-full">
                                        <p>Bio of {{$book->translator->name ?? ''}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="flex w-full col-span-3">
                                <h3 class="text-md text-gray-600 baseline mx-3">Editoria:</h3>
                                <div class="relative group col-span-2 baseline">
                                    <span class="text-md text-blue-600 cursor-pointer hover:underline">{{$book->editor->name ?? ''}}</span>
                                    <div class="absolute left-0 w-48 mt-1 rounded-lg shadow-lg bg-white p-3 text-sm text-gray-800 hidden group-hover:block z-90">
                                        <img src="https://via.placeholder.com/50" alt="Contributor" class="w-12 h-12 rounded-full">
                                        <p>Bio of {{$book->editor->name ?? ''}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="flex w-full col-span-3">
                                <h3 class="text-md text-gray-600 baseline mx-3">Publicação:</h3>
                                <div class="relative group col-span-2 baseline">
                                    <span class="text-md text-blue-600 cursor-pointer hover:underline">{{$book->publisher->name ?? ''}}</span>
                                    <div class="absolute left-0 w-48 mt-1 rounded-lg shadow-lg bg-white p-3 text-sm text-gray-800 hidden group-hover:block z-90">
                                        <img src="https://via.placeholder.com/50" alt="Contributor" class="w-12 h-12 rounded-full">
                                        <p>Bio of {{$book->publisher->name ?? ''}}</p>
                                    </div>
                                </div>
                            </div>
                            

                           
                        </div>
                    </div>
            
                    <!-- Right Column: Description and Contributors -->
                    <div class="col-span-3 my-3">
                        <div>
                            <p class="text-sm text-gray-600">{!! $book->description ?? '' !!}</p>
                        </div>

                    </div>
                </div>
            </div>
            {{-- <div class="container grid flex-grid">
                
                <div class="books max-w-sm rounded overflow-hidden shadow-lg bg-white transition-shadow hover:shadow-2xl">
                    <img class="w-full h-36 object-cover" src="{{asset("storage/{$book->cover_image}")}}" alt="Book Cover">
                    <div class="p-6 grid grid-cols-1 gap-2">
                        <div class="font-bold text-xl mb-6">{{$book->title}}</div>
                        <p class="text-gray-700 text-base">{{$book->author->name}}</p>
                        <hr class="py-6">
                        <div class="text-gray-600 text-sm mt-2 border rounded-md	">
                            <div class="font-bold text-lg mb-2">{{$book->subtitle}}</div>
                            <div class="p-6 grid grid-cols-2">
                                <div class="mt-3">
                                    <p class="text-gray-600 mb-4">{!!$book->description!!}</p>
                                </div>
                                <div class="flex mt-3 grid grid-cols-2">
                                    <div class="">
                                        <strong>Published:</strong>
                                    </div>
                                    <div class="">
                                        <p>{{$book->publish_date}}</p>
                                    </div>
                                    <div class="">
                                        <strong>Genre:</strong>
                                    </div>
                                    <div class="">
                                        <p>{{$book->genre->name}}</p>
                                    </div>
                                    <div class="">
                                        <strong>Language:</strong>
                                    </div>
                                    <div class="">
                                        <p>{{$book->language->name}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <a href="#" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded transition duration-200">Read More</a>
                        </div>
                    </div>
                    <div class="p-6 bg-gray-100">
                        <h4 class="text-lg font-semibold mb-4">Gallery</h4>
                        <div class="grid grid-cols-2 gap-4">
                            <img src="gallery_image_url_1" alt="Gallery Image" class="w-full h-32 object-cover rounded" />
                            <img src="gallery_image_url_2" alt="Gallery Image" class="w-full h-32 object-cover rounded" />
                            <img src="gallery_image_url_3" alt="Gallery Image" class="w-full h-32 object-cover rounded" />
                            <img src="gallery_image_url_4" alt="Gallery Image" class="w-full h-32 object-cover rounded" />
                        </div>
                    </div>
                </div>
        
                <!-- Gallery Section -->
            </div> --}}
        @endforeach
    </div>
    <div>
        <!-- Book Card -->
       
    </div>
</div>
