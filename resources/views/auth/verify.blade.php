@extends('layouts.app')

@section('title', 'Verification')

@section('content')
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="bg-indigo-700">
        <div class="max-w-2xl mx-auto text-center py-16 px-4 sm:py-20 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-extrabold text-white sm:text-4xl">
                <span class="block">You need to verify your email.</span>
            </h2>
            <p class="mt-4 text-lg leading-6 text-indigo-200">Please check your inbox for your verification email and click the link.</p>
            <form action="/email/verification-notification" method="POST">
                @csrf
                <button type="submit" class="mt-8 w-full inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-indigo-50 sm:w-auto">
                    Resend Verification Email.
                </button>
            </form>

        </div>
    </div>
@endsection
