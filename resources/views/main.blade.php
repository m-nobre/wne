@extends('layouts.frontpage')´

@push('head')
    <style>
        body{ 
                background-image: url("storage/images/fundo.png");
                background-attachment: fixed;
                background-size: cover;
                background-repeat: no-repeat;

            }
    </style>
@endpush

@section('content')
<div class="absolute top-12 min-w-full grid grid-cols-6">
    <div class="col-start-2 col-span-4 items-start	place-items-center">
        <div class="place-items-center">
            <div class="relative top-0">
                <img src="{{asset('storage/images/wneround.png')}}" alt="Works New Era">
            </div>
            <div class="desktop:-mt-[600px] tablet:-mt-[500px] tablet-small:-mt-[500px] mobile-large:-mt-[400px] mobile-medium:-mt-[360px] mobile-small:-mt-[330px]">
                <svg viewBox="0 0 0 0">
                    <defs>
                        <linearGradient id="myGradient">
                            <stop offset="0%" stop-color="#FEDB37" />
                            <stop offset="8%" stop-color="#FDB931" />
                            <stop offset="30%" stop-color="#9f7928" />
                            <stop offset="40%" stop-color="#FEDB37" />
                            <stop offset="60%" stop-color="#5d4a1f" />
                            <stop offset="70%" stop-color="#D1B464" />
                            <stop offset="90%" stop-color="#FFFFAC" />
                            <stop offset="100%" stop-color="#8A6E2F" />
                        </linearGradient>
                        </defs>
                    <path id="curve" d="M73.2,148.6c4-6.1,65.5-96.8,178.6-95.6c111.3,1.2,170.8,90.3,175.1,97" style="fill: transparent;" />
                </svg>
                <div id="logo-3d-container">
                    @vite('resources/js/logo.js')
                </div>
            </div>
        </div>
    </div>
  </div>
{{-- <div class="grid grid-cols-6 gap-4">
    <div class="col-start-2 col-span-4">
        <svg viewBox="0 0 800 800">
            <defs>
                <linearGradient id="myGradient">
                  <stop offset="0%" stop-color="#FEDB37" />
                  <stop offset="8%" stop-color="#FDB931" />
                  <stop offset="30%" stop-color="#9f7928" />
                  <stop offset="40%" stop-color="#FEDB37" />
                  <stop offset="60%" stop-color="#5d4a1f" />
                  <stop offset="70%" stop-color="#D1B464" />
                  <stop offset="90%" stop-color="#FFFFAC" />
                  <stop offset="100%" stop-color="#8A6E2F" />
                </linearGradient>
              </defs>
            <path id="curve" d="M73.2,148.6c4-6.1,65.5-96.8,178.6-95.6c111.3,1.2,170.8,90.3,175.1,97" style="fill: transparent;" />
        </svg>
        <div id="logo-3d-container">
            @vite('resources/js/logo.js')
        </div>
        <div>
            <img src="{{asset('storage/images/wneround.png')}}" alt="Works New Era">
        </div>
    </div>

</div> --}}

@stop

@push('scripts')
    <script>
        $(function() {
            console.log('All systems on.');
        });
    </script>
@endpush