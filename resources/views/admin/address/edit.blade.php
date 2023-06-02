@extends('admin.layouts.parent')

@section('title', __('messages.frontend.address.title'))

@section('header')
    @include('admin.layouts.partials.header')
@endsection

@section('footer')
    @include('admin.layouts.partials.footer')
@endsection

@section('content')
    @parent
    @include('admin.layouts.partials.sidebar')
    <div class="content-wrapper">
        <div class="row bg0 p-t-75 p-b-85 ">
            <div class="col-lg-12 col-xl-12 border m-b-50">
                <div class="p-5">
                    <h4 class="mb-4"> {{ __('messages.frontend.address.add_details') }} </h4>
                    @include('seller.layouts.partials.errors')
                    <form action="{{ route('admins.addresses.update', \Illuminate\Support\Facades\Crypt::encryptString($address->id)) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="bor8 m-b-20 how-pos4-parent">
                            <div class="rs1-select2 rs2-select2 form-group">
                                <select class="select2" name="city_id" id="city">
                                    <option selected disabled> {{ __('messages.frontend.address.choose_city') }} </option>
                                    @foreach ($cities as $city)
                                        <option @selected(old('city_id', $address->region->city->id) == $city->id) value="{{ $city->id }}" class='px-4'> {{ $city->name }}</option>
                                    @endforeach
                                </select>
                                <div class="dropDownSelect2"></div>
                            </div>
                        </div>
                        <div class="form-group " id="region_wrap">
                            <div class="rs1-select2 rs2-select2 bg0">
                                <select class="select2 " name="region_id" id="region">
                                    @foreach ($regions as $region)
                                        <option @selected(old('region_id', $address->region->id) == $region->id) value="{{ $region->id }}" class='px-4'> {{ $region->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <input class="form-control " type="text" name="street" placeholder="{{ __('messages.frontend.address.street') }}" value="{{ old('street', $address->street) }}">
                        </div>
                        <div class="form-group">
                            <input class="form-control " type="text" name="building" placeholder="{{ __('messages.frontend.address.building') }}" value="{{ old('building', $address->building) }}">
                        </div>
                        <div class="form-group">
                            <input class="form-control " type="text" name="floor" placeholder="{{ __('messages.frontend.address.floor') }}" value="{{ old('floor', $address->floor) }}">
                        </div>
                        <div class="form-group">
                            <input class="form-control " type="text" name="flat" placeholder="{{ __('messages.frontend.address.flat') }}" value="{{ old('flat', $address->flat) }}">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control  " name="notes" placeholder="{{ __('messages.frontend.address.notes') }}">{{ old('notes', $address->notes) }}</textarea>
                        </div>
                        <div class="form-group">
                            <div class="rs1-select2 rs2-select2 bor8 bg0">
                                <select class="js-select2" name="type" id="type">
                                    <option @selected(old('type', $address->type) === 'HOME') value="HOME">{{ __('messages.frontend.address.home') }}</option>
                                    <option @selected(old('type', $address->type) === 'WORK') value="WORK">{{ __('messages.frontend.address.work') }}</option>
                                </select>
                            </div>
                        </div>
                        <button href="{{ route('users.address.index') }}" class="button-general w-50 m-tb-5">
                            {{ __('messages.frontend.address.edit_address') }}
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $("#city").select2({
                tags: true,
                width: '100%',
                templateSelection: function(data, container) {
                    // Add the 'pl-3' and 'pr-3' classes to the selected option element
                    $(container).addClass('');
                    return data.text;
                }
            });
            $("#region").select2({ // turn on Select2
                tags: true,
                width: '100%',
                templateSelection: function(data, container) {
                    // Add the 'pl-3' and 'pr-3' classes to the selected option element
                    $(container).addClass('');
                    return data.text;
                }
            });
            $("#type").select2({
                tags: true,
                width: '100%',
                templateSelection: function(data, container) {
                    // Add the 'pl-3' and 'pr-3' classes to the selected option element
                    $(container).addClass('');
                    return data.text;
                }
            });

            $('#city').on('select2:select', function(event) {
                var city_id = event.target.value;
                const url = "{{ asset('api/regions') }}";
                const method = "POST";
                const body = {
                    'city_id': city_id,
                };
                const button = $(this);
                $.ajax({
                    url: url,
                    type: method,
                    headers: {
                        'accept': 'application/json'
                    },
                    data: body,
                    success: function(result) {
                        console.log(result)
                        $('#region').empty(); // Clear the options
                        $.each(result.data, function(index, value) { // append new options
                            if ($('html').attr('lang') == 'en') {
                                var text = value.name.en;
                            } else if ($('html').attr('lang') == 'ar') {
                                var text = value.name.ar;
                            }
                            var option = new Option(text, value.id);
                            $('#region').append(option);
                        });
                        $('#region').removeClass('d-none'); // show select 2
                        $('#region_wrap').removeClass('d-none'); // show select 2

                    },
                    error: function(result) {
                        console.log(result);
                        Swal.fire(
                            'Failed',
                            'Something went wrong',
                            'error'
                        );
                    }
                });
            });
        });
    </script>
    @include('components.redirect-messages')
@endpush
