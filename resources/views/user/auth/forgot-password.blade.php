@extends('user.layouts.parent')

@section('title', __('user.auth.forgot_password.title'))

@section('header')
    @include('user.layouts.partials.header')
@endsection

@section('footer')
    @include('user.layouts.partials.footer')
@endsection

@push('links')
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
@endpush

@section('content')
    @parent
    <div class="" style="background-image: url({{ asset('frontend-assets/images/about-02.jpg') }}); height: 100vh; background-size: cover;">
        <div class="container p-t-80 ">
            <div class="bg-light m-auto size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">

                <!-- Logo desktop -->
                <a href="#" class="logo p-t-20">
                    <img src="{{ asset('frontend-assets/images/icons/logo-01.png') }}" alt="IMG-LOGO" style="margin: auto; padding-bottom: 20px;">
                </a>

                <!-- Title -->
                <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('user.auth.forgot_password.message') }}
                </div>
                <div class="bor8 m-b-20 how-pos4-parent">
                    <label for="email" :value="__('Email')"></label>
                    <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" id="email" type="email" name="email"
                        :value="old('email')" required autofocus placeholder="{{ __('user.auth.forgot_password.email') }}">
                </div>
                @if ($errors->get('email'))
                        <ul class='text-sm text-red my-2'>
                            @foreach ($errors->get('email') as $message)
                                <p class="text-danger">{{ $message }}</p>
                            @endforeach
                        </ul>
                    @endif

                <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                    {{ __('user.auth.forgot_password.send_password_email_reset') }}
                </button>
            </form>
        </div>
    </div>
@endsection
