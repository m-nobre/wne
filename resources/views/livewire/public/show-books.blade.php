<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <div class="max-w-4xl mx-auto p-4">
        <!-- Book Card -->
        <div class="rounded-lg shadow-lg overflow-hidden w-full">
            <!-- Slideshow -->
            <div class="grid grid-cols-2 gap-6 w-full p-3">
                @foreach ($books as $book)
                <div class="container grid flex-grid">
                    
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
                </div>
                @endforeach
            </div>

            <div class="flex items-center justify-between p-4 ">
                <button class="select-none rounded bg-indigo-500 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-indigo-500/20 transition-all hover:shadow-lg hover:shadow-indigo-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none peer-placeholder-shown:pointer-events-none peer-placeholder-shown:bg-blue-gray-500 peer-placeholder-shown:opacity-50 peer-placeholder-shown:shadow-none disabled:bg-slate-50 disabled:text-slate-300 disabled:border-slate-200" onclick="prevSlide()">Prev</button>
                <button class="select-none rounded bg-indigo-500 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-indigo-500/20 transition-all hover:shadow-lg hover:shadow-indigo-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none peer-placeholder-shown:pointer-events-none peer-placeholder-shown:bg-blue-gray-500 peer-placeholder-shown:opacity-50 peer-placeholder-shown:shadow-none disabled:bg-slate-50 disabled:text-slate-300 disabled:border-slate-200" onclick="nextSlide()">Next</button>
            </div>
    
           
        </div>
    </div>
    
    <script>
        $(function(){
            var scroll = false;
            
            if (scroll == false) {
                $(".books").css('visibility', 'hidden');
                addEventListener("scroll", (event) => {
                    ScrollReveal().reveal('.books', { origin: 'bottom', delay: 500, easing: 'ease-in', duration: 500});
                    scroll = true
                });
            } else {
                $(".books").css('opacity', 1);

            }


        });
    </script>
    
</div>
