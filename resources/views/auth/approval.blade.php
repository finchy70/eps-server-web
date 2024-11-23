@extends('layouts.app')

@section('title', 'Not Approved')

@section('content')
    <div class="bg-indigo-700">
        <div class="max-w-2xl mx-auto text-center py-16 px-4 sm:py-20 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-extrabold text-white sm:text-4xl">
                <span class="block">Your account has not been verified by the EPS administrator.</span>
            </h2>
            <p class="mt-4 text-lg leading-6 text-indigo-200">Please check back regularly.</p>
            <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="mt-8 w-full inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-indigo-50 sm:w-auto">
                    Logout
                </button>
            </form>

        </div>
    </div>
@endsection
