@extends('user.layouts.parent')

@section('title', __('messages.frontend.shop.title'))

@section('header')
    @include('user.layouts.partials.header')
@endsection

@section('cart')
    @include('user.layouts.partials.cart')
@endsection

@section('content')
    @parent
    <!-- Product -->
    <section class="bg0 p-t-23 p-b-140 m-t-60">
        <div class=" mx-auto" style="width: 90%">
            <div class="p-b-10">
                <h3 class="ltext-103 cl5">
                    {{ __('messages.frontend.index.product_overview') }}
                </h3>
            </div>

            <div class="flex-w flex-sb-m p-b-52">
                <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
                        {{ __('messages.frontend.index.all_products') }}
                    </button>

                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".women">
                        Women
                    </button>

                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".men">
                        Men
                    </button>

                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".bag">
                        Bag
                    </button>

                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".shoes">
                        Shoes
                    </button>

                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".watches">
                        Watches
                    </button>
                </div>

                <div class="flex-w flex-c-m m-tb-10">
                    <div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
                        <i class="m-2 zmdi zmdi-filter-list"></i>
                        <i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                        {{ __('messages.frontend.index.filter') }}
                    </div>

                    <div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
                        <i class="m-2 zmdi zmdi-search"></i>
                        <i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                        {{ __('messages.frontend.index.search') }}
                    </div>
                </div>

                <!-- Search product -->
                <div class="dis-none panel-search w-full p-t-10 p-b-15">
                    <div class="bor8 dis-flex p-l-15">
                        <button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
                            <i class="zmdi zmdi-search"></i>
                        </button>

                        <input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product"
                            placeholder="{{ __('messages.frontend.index.search') }}">
                    </div>
                </div>

                <!-- Filter -->
                <div class="dis-none panel-filter w-full p-t-10">
                    <div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
                        <div class="filter-col1 p-r-15 p-b-27">
                            <div class="mtext-102 cl2 p-b-15">
                                {{ __('messages.frontend.index.sort_by') }}
                            </div>

                            <ul>
                                <li class="p-b-6">
                                    <a style="text-decoration: none" href="#" class="filter-link stext-106 trans-04">
                                        {{ __('messages.frontend.index.default') }}
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a style="text-decoration: none" href="#" class="filter-link stext-106 trans-04">
                                        {{ __('messages.frontend.index.popularity') }}
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a style="text-decoration: none" href="#" class="filter-link stext-106 trans-04">
                                        {{ __('messages.frontend.index.avg_rating') }}
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a style="text-decoration: none" href="#" class="filter-link stext-106 trans-04 filter-link-active">
                                        {{ __('messages.frontend.index.newest') }}
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a style="text-decoration: none" href="#" class="filter-link stext-106 trans-04">
                                        {{ __('messages.frontend.index.price_low_high') }}
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a style="text-decoration: none" href="#" class="filter-link stext-106 trans-04">
                                        {{ __('messages.frontend.index.price_high_low') }}
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="filter-col2 p-r-15 p-b-27">
                            <div class="mtext-102 cl2 p-b-15">
                                {{ __('messages.frontend.index.price') }}
                            </div>

                            <ul>
                                <li class="p-b-6">
                                    <a style="text-decoration: none" href="#" class="filter-link stext-106 trans-04 filter-link-active">
                                        {{ __('messages.frontend.index.all') }}
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a style="text-decoration: none" href="#" class="filter-link stext-106 trans-04">
                                        $0.00 - $50.00
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a style="text-decoration: none" href="#" class="filter-link stext-106 trans-04">
                                        $50.00 - $100.00
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a style="text-decoration: none" href="#" class="filter-link stext-106 trans-04">
                                        $100.00 - $150.00
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a style="text-decoration: none" href="#" class="filter-link stext-106 trans-04">
                                        $150.00 - $200.00
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a style="text-decoration: none" href="#" class="filter-link stext-106 trans-04">
                                        $200.00+
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="filter-col3 p-r-15 p-b-27">
                            <div class="mtext-102 cl2 p-b-15">
                                {{ __('messages.frontend.index.color') }}
                            </div>

                            <ul>
                                <li class="p-b-6">
                                    <span class="fs-15 lh-12 m-r-6" style="color: #222;">
                                        <i class="zmdi zmdi-circle"></i>
                                    </span>

                                    <a style="text-decoration: none" href="#" class="filter-link stext-106 trans-04">
                                        {{ __('messages.frontend.index.black') }}
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <span class="fs-15 lh-12 m-r-6" style="color: #4272d7;">
                                        <i class="zmdi zmdi-circle"></i>
                                    </span>

                                    <a style="text-decoration: none" href="#" class="filter-link stext-106 trans-04 filter-link-active">
                                        {{ __('messages.frontend.index.blue') }}
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <span class="fs-15 lh-12 m-r-6" style="color: #b3b3b3;">
                                        <i class="zmdi zmdi-circle"></i>
                                    </span>

                                    <a style="text-decoration: none" href="#" class="filter-link stext-106 trans-04">
                                        {{ __('messages.frontend.index.grey') }}
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <span class="fs-15 lh-12 m-r-6" style="color: #00ad5f;">
                                        <i class="zmdi zmdi-circle"></i>
                                    </span>

                                    <a style="text-decoration: none" href="#" class="filter-link stext-106 trans-04">
                                        {{ __('messages.frontend.index.green') }}
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <span class="fs-15 lh-12 m-r-6" style="color: #fa4251;">
                                        <i class="zmdi zmdi-circle"></i>
                                    </span>

                                    <a style="text-decoration: none" href="#" class="filter-link stext-106 trans-04">
                                        {{ __('messages.frontend.index.red') }}
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <span class="fs-15 lh-12 m-r-6" style="color: #aaa;">
                                        <i class="zmdi zmdi-circle-o"></i>
                                    </span>

                                    <a style="text-decoration: none" href="#" class="filter-link stext-106 trans-04">
                                        {{ __('messages.frontend.index.white') }}
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="filter-col4 p-b-27">
                            <div class="mtext-102 cl2 p-b-15">
                                {{ __('messages.frontend.index.tags') }}
                            </div>

                            <div class="flex-w p-t-4 m-r--5">
                                <a style="text-decoration: none" href="#"
                                    class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                    {{ __('messages.frontend.index.fashion') }}
                                </a>

                                <a style="text-decoration: none" href="#"
                                    class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                    {{ __('messages.frontend.index.lifestyle') }}
                                </a>

                                <a style="text-decoration: none" href="#"
                                    class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                    {{ __('messages.frontend.index.denim') }}
                                </a>

                                <a style="text-decoration: none" href="#"
                                    class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                    {{ __('messages.frontend.index.streetstyle') }}
                                </a>

                                <a style="text-decoration: none" href="#"
                                    class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                    {{ __('messages.frontend.index.crafts') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row isotope-grid">
                @foreach ($products as $product)
                    <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                        <!-- Block2 -->
                        <div class="block2">
                            <div class="block2-pic hov-img0">
                                <img src="{{ asset('frontend-assets/images/product-05.jpg') }}" alt="IMG-PRODUCT">

                                <a style="text-decoration: none" href="#"
                                    class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                    {{__('messages.frontend.index.quick_view')}}
                                </a>
                            </div>

                            <div class="block2-txt flex-w flex-t p-t-14">
                                <div class="block2-txt-child1 flex-col-l ">
                                    <a style="text-decoration: none" href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                        {{$product->name}}
                                    </a>

                                    <span class="stext-105 cl3">
                                        {{$product->sale_price_with_currency()}}
                                    </span>
                                </div>

                                <div class="block2-txt-child2 flex-r p-t-3">
                                    <a style="text-decoration: none" href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                        <img class="icon-heart1 dis-block trans-04"
                                            src="{{ asset('frontend-assets/images/icons/icon-heart-01.png') }}"
                                            alt="ICON">
                                        <img class="icon-heart2 dis-block trans-04 ab-t-l"
                                            src="{{ asset('frontend-assets/images/icons/icon-heart-02.png') }}"
                                            alt="ICON">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Load more -->
            <div class="flex-c-m flex-w w-full p-t-45">
                <a style="text-decoration: none" href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
                    {{ __('messages.frontend.index.load_more') }}
                </a>
            </div>
        </div>
    </section>
@endsection

@section('footer')
    @include('user.layouts.partials.footer')
@endsection
