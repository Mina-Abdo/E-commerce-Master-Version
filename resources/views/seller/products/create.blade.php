@extends('seller.layouts.parent')

@section('title', __('seller.sidebar.create'))

@section('header')
    @include('seller.layouts.partials.header')
@endsection

@section('content')
    @parent
    @include('seller.layouts.partials.sidebar')
    <div class="content-wrapper">
        <section class="content my-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"> {{ __('seller.sidebar.create') }} </h3>
                            </div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="card-body">
                                <form method="post" action="{{ route('sellers.products.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="name_en">{{ __('seller.add_product.name_en') }}</label>
                                            <input type="text" name="name[en]" class="form-control" id="name_en">
                                        </div>
                                        <div class="form-group">
                                            <label for="name_ar">{{ __('seller.add_product.name_ar') }}</label>
                                            <input type="text" name="name[ar]" class="form-control" id="name_ar">
                                        </div>
                                        <div class="form-group">
                                            <label for="purchase_price">{{ __('seller.add_product.purchase_price') }}</label>
                                            <input type="number" name="purchase_price" class="form-control" id="purchase_price">
                                        </div>
                                        <div class="form-group">
                                            <label for="sale_price">{{ __('seller.add_product.sale_price') }}</label>
                                            <input type="number" name="sale_price" class="form-control"  id="sale_price">
                                        </div>
                                        <div class="form-group">
                                            <label for="quantiy">{{ __('seller.add_product.quantity') }}</label>
                                            <input type="number" name="quantiy" class="form-control" id="quantiy">
                                        </div>
                                        <div class="form-group">
                                            <label for="status">{{ __('seller.add_product.status') }}</label>
                                            <select name="status" class="form-control" id="status">
                                                <option value="" disabled selected></option>
                                                <option value="1">{{__('seller.add_product.active')}}</option>
                                                <option value="0">{{__('seller.add_product.not_active')}}</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="category_id">{{ __('seller.add_product.category') }}</label>
                                            <select name="category_id" class="form-control" id="category_id">
                                                @foreach ($categories as $category)
                                                    <option value="" disabled selected></option>
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" name="description[en]" placeholder="{{__('seller.add_product.description_en')}}"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" name="description[ar]" placeholder="{{__('seller.add_product.description_ar')}}"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-2">
                                                    <input type="file" class="d-none" name="image" id="file" onchange="loadFile(event)">
                                                    <label for="file">
                                                        <img src="{{asset('custom-images/default.png')}}" alt="default" class="w-100 " id="image" style="cursor: pointer">
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer ">
                                        <button type="submit" class="button-general w-50"> {{__('seller.add_product.submit')}} </button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('footer')
    @include('seller.layouts.partials.footer')
@endsection

@push('scripts')
    <script>
        var loadFile = function(event) {
            var output = document.getElementById('image');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>
@endpush
