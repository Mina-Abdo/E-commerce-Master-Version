@extends('seller.layouts.parent')

@section('title', __('seller.auth.reset_password.title'))

@push('scripts')
    @vite('resources/js/app.js')
@endpush

@section('content')
    @parent
    <div class="container d-flex justify-content-center m-t-300">
        <div class="w-75 shadow p-3 mb-5 bg-body rounded">
            <div class="card-body register-card-body">
                <form action="{{ route('sellers.password.store') }}" method="POST">
                    @csrf
                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
                    <!-- Email Address -->
                    <div class="input-group mb-3">
                        <input class="form-control" type="email" name="email" value="{{ $request->input('email') }}"
                            required autofocus placeholder="{{ __('seller.auth.login.email') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @if ($errors->get('email'))
                            <ul class='text-sm text-red-600 dark:text-red-400 space-y-1 mt-2'>
                                @foreach ($errors->get('email') as $message)
                                    <p class="text-danger">{{ $message }}</p>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                    <!-- Password -->
                    <div class="input-group mb-3">
                        <input class="form-control" type="password" name="password" required autocomplete="new-password"
                            placeholder="{{ __('seller.auth.login.password') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @if ($errors->get('password'))
                            <ul class='text-danger  space-y-1 mt-2'>
                                @foreach ($errors->get('password') as $message)
                                    <p class="text-danger">{{ $message }}</p>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                    <!-- Confirm Password -->
                    <div class="input-group mb-3">
                        <input class="form-control" type="password" name="password_confirmation" required
                            placeholder="{{ __('seller.auth.reset_password.confirm_password') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @if ($errors->get('password_confirmation'))
                            <ul class='text-danger  space-y-1 mt-2'>
                                @foreach ($errors->get('password_confirmation') as $message)
                                    <p class="text-danger">{{ $message }}</p>
                                @endforeach
                            </ul>
                        @endif
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-dark btn-block rounded-pill"
                                style="background-color: black;">{{ __('seller.auth.reset_password.reset_password') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('links')
    @vite('resources/css/app.css')
@endpush


