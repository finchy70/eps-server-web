@extends('layouts.app')

@section('title', "Privacy")

@section('content')

    <div class="relative bg-gray-50">
        <div class="relative bg-white shadow">
            <main class="lg:relative">
                <div class="mx-auto max-w-7xl w-full pt-16 pb-20 text-center lg:py-48 lg:text-left">
                    <div class="px-4 lg:w-1/2 sm:px-8 xl:pr-16">
                        <h2 class="text-4xl tracking-tight leading-10 font-extrabold text-gray-900 sm:text-5xl sm:leading-none md:text-6xl lg:text-5xl xl:text-6xl">
                            EPS Inspect
                            <br>
                            <span class="text-indigo-600">Privacy</span>
                        </h2>
                        <p class="mt-3 max-w-md mx-auto text-lg text-gray-500 sm:text-xl md:mt-5 md:max-w-3xl">
                            EPS Inspect is a private application and does not collect any personal data.
                            You must be employed by EPS Construction Limited and have been authorised to use the application.
                        </p>

                    </div>
                </div>
                <div class="relative w-full h-64 sm:h-72 md:h-96 lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2 lg:h-full">
                    <img class="absolute inset-0 w-full h-full object-cover" src="{{asset('/images/electric_pylons.jpg')}}" alt="Woman on her phone">
                </div>
            </main>
        </div>
    </div>

@stop
