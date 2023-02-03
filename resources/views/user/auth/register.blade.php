{{-- <x-guest-layout>
    <form method="POST" action="{{ route('users.register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Phone -->
        <div class="mt-4">
            <x-input-label for="phone" :value="__('Phone')" />
            <x-text-input id="phone" class="block mt-1 w-full" type="number" name="phone" :value="old('phone')" required />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('users.login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

@extends('user.layouts.parent')

@section('title', 'Register')

@section('header')
    @include('user.layouts.partials.header')
@endsection

@section('footer')
    @include('user.layouts.partials.footer')
@endsection

@push('links')
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
@endpush

@push('links')
<link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
@endpush

@push('scripts')
@vite(['resources/css/app.css', 'resources/js/app.js'])
@endpush

@section('content')
@parent
<div class="container m-t-200">
    <div class="m-lr-auto size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md m-b-100">
        <form method="POST" action="{{ route('users.register') }}">
            @csrf

            <h4 class="mtext-105 cl2 txt-center p-b-30">
                Rigester as User
            </h4>

            <!-- Name -->
            <div class=" m-b-20 how-pos4-parent">
                <label class="m-b-25" for="name" :value="__('Name')"></label>
                <input class="border-grey stext-111 cl2 plh3 size-116 p-l-62 p-r-30" id="name" type="text" name="name"
                    :value="old('name')" required autofocus placeholder="Name">
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email -->
            <div class=" m-b-20 how-pos4-parent">
                <label for="email" :value="__('Email')"></label>
                <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" id="email" type="email" name="email"
                    :value="old('email')" required placeholder="Your Email Address">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Phone -->
            <div class=" m-b-20 how-pos4-parent">
                <label for="phone" :value="__('Phone')"></label>
                <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" id="phone" type="number" name="phone"
                    :value="old('phone')" required placeholder="Your Phone Number">
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class=" m-b-20 how-pos4-parent">
                <label for="password" :value="__('Password')"></label>
                <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" id="password" type="password" name="password"
                    required autocomplete="current-password" placeholder="Your Password">
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class=" m-b-20 how-pos4-parent">
                <label for="password_confirmation" :value="__('Confirm Password')"></label>
                <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" id="password_confirmation" type="password" name="password_confirmation"
                    required autocomplete="current-password" placeholder="Confirm Password">
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('users.login') }}">
                    {{ __('Already registered?') }}
                </a>

                <button class=" stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                    Register
                </button>
            </div>

        </form>
    </div>
</div>
@endsection

