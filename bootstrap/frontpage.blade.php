<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>

        
        <style>
            #logo-3d-container {
                margin-bottom: 120px;
            }
            
            .fixed-bg {
                /* The background image */
                background-image: url("storage/images/fundo.png");

                /* Set a specified height, or the minimum height for the background image */
                min-height: 500px;

                /* Set background image to fixed (don't scroll along with the page) */
                background-attachment: fixed;

                /* Center the background image */
                background-position: center;

                /* Set the background image to no repeat */
                background-repeat: no-repeat;

                /* Scale the background image to be as large as possible */
                background-size: cover;
            }
            .title-text {
                background-color: #333;
                font-family: 'Impact', cursive;
                font-size: 73px;
            }

            path {
                fill: transparent;
            }

            text {
                fill: #b97816;
            }

            .hover-popup {
                display: none;
                position: absolute;
                background: white;
                border: 1px solid #ddd;
                border-radius: 0.375rem; /* rounded-md */
                padding: 0.5rem;
                z-index: 10;
                width: 200px; /* Adjust as necessary */
            }
            .hover-container:hover .hover-popup {
                display: block;
                
            }
        </style>

        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
                <!-- Scripts -->
                @vite(['resources/css/app.css', 'resources/js/app.js'])
        @stack("head")

    </head>
    <body class="font-sans antialiased  dark:text-white/50 fixed-bg">
        <div class="relative flex grid w-full h-full justify-items-center justify-center min-h-100 flex-1" style="margin-top:33px">

            <div class="flex relative" style="margin-bottom:-400px;">
                
                <svg viewBox="0 0 500 500">
                    <path id="curve" d="M73.2,148.6c4-6.1,65.5-96.8,178.6-95.6c111.3,1.2,170.8,90.3,175.1,97" />
                    <text width="300" class="title-text">
                        <textPath xlink:href="#curve">
                            Works New Era
                        </textPath>
                    </text>
                </svg>
            </div>                           
            <div id="logo-3d-container" class="flex-1 relative grid justify-items-center">
                
                @vite('resources/js/logo.js')

            </div>
            
        </div>
        @livewire('public.show-books')
        
        <footer class="py-10 text-center text-sm text-black dark:text-white/70">
            <div>❂</div>
            <div>
                Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
            </div>
            <div class="p-2">
                @if (Route::has('login'))
                    @auth
                        <a
                            href="{{ url('/dashboard') }}"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                            Dashboard
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Register
                            </a>
                        @endif
                    @endauth
                @endif
            </div>
        </footer>
    </body>
</html>
