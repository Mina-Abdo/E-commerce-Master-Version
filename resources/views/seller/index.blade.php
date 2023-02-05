@extends('seller.layouts.parent')

@section('title', 'Index')

@section('content')
    @parent


    <div class="bg-index d-flex flex-column justify-content-center " >
        <div class="m-s-auto">
            <h2 class="fw-bold text-dark" >
                Want to become a seller in our website
            </h2>
        </div>
        <div class="d-flex justify-content-center align-items-center">
            <div class="container h-full d-flex justify-content-between align-items-center bg-transpernet ">
                <div class="" data-appear="fadeInDown" data-delay="0">
                    <h3 class="text-dark fw-bolder">
                        Already have a seller account
                    </h3>
                    <a href="{{route('sellers.login')}}" class="btn btn-dark border rounded-pill w-25 m-l-auto">
                        Login
                    </a>
                </div>

                <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
                    <h3 class="text-white">
                        Do not have account
                    </h3>
                    <a href="{{route('sellers.register')}}" class="btn btn-dark border rounded-pill w-50 m-l-auto">
                        Register
                    </a>
                </div>
        </div>
    </div>

@endsection
