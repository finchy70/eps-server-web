@extends('layouts.app')

@section('title', "Dashboard")

@section('content')

    <div class="relative bg-gray-50">
        <div class="relative bg-white shadow">
            <main class="lg:relative">
                <div class="mx-auto max-w-7xl w-full pt-16 pb-20 text-center lg:py-48 lg:text-left">
                    <div class="px-4 lg:w-1/2 sm:px-8 xl:pr-16">
                        <h2 class="text-4xl tracking-tight leading-10 font-extrabold text-gray-900 sm:text-5xl sm:leading-none md:text-6xl lg:text-5xl xl:text-6xl">
                            EPS Inspect
                            <br>
                            <span class="text-indigo-600">online portal</span>
                        </h2>
                        <p class="mt-3 max-w-md mx-auto text-lg text-gray-500 sm:text-xl md:mt-5 md:max-w-3xl">
                            EPS Inspection Reports - Client Portal.
                        </p>
                        <div class="mt-10 sm:flex sm:justify-center lg:justify-start">
                            <div class="rounded-md shadow">
                                <a href="/login" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo transition duration-150 ease-in-out md:py-4 md:text-lg md:px-10">
                                    Login
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="relative w-full h-64 sm:h-72 md:h-96 lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2 lg:h-full">
                    <img class="absolute inset-0 w-full h-full object-cover" src="{{asset('/images/electric_pylons.jpg')}}" alt="Woman on her phone">
                </div>
            </main>
        </div>
    </div>

@stop

