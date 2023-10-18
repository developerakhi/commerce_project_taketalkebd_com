@extends('frontend.layouts.app')

@section('content')
    <!-- Sliders & Today's deal -->

    <div class="home-banner-area" style="">
        <div class="container">
            <div class="d-flex flex-wrap position-relative">
                <div class="position-static d-none d-xl-block">
                    <div class="aiz-category-menu bg-white rounded-0 border-top" id="category-sidebar" style="width:270px;">
                        <ul class="list-unstyled categories no-scrollbar mb-0 text-left">
                            @foreach (\App\Models\Category::where('level', 0)->orderBy('order_level', 'desc')->get()->take(11) as $key => $category)
                                <li class="category-nav-element border border-top-0" data-id="{{ $category->id }}">
                                    <a href="{{ route('products.category', $category->slug) }}" class="text-truncate text-dark px-4 fs-14 d-block hov-column-gap-1">
                                        <img class="cat-image lazyload mr-2 opacity-60"
                                            src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                            data-src="{{ uploaded_asset($category->icon) }}"
                                            width="16"
                                            alt="{{ $category->getTranslation('name') }}"
                                            onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
                                        <span class="cat-name has-transition">{{ $category->getTranslation('name') }}</span>
                                    </a>
                                    @if(count(\App\Utility\CategoryUtility::get_immediate_children_ids($category->id))>0)
                                    <div class="sub-cat-menu c-scrollbar-light border p-4 shadow-none">
                                        <div class="c-preloader text-center absolute-center">
                                            <i class="las la-spinner la-spin la-3x opacity-70"></i>
                                        </div>
                                    </div>
                                    @endif
                                </li>
                                @endforeach
                        </ul>
                    </div>
                </div>

                <!-- Sliders -->
                
                @php
                    $num_todays_deal = count($todays_deal_products);
                @endphp
                <div class="home-slider">
                    <div class="aiz-carousel dots-inside-bottom mobile-img-auto-height" data-autoplay="true">
                        <div class="carousel-box">
                            <a href="https://taketalkbd.com/category/iphone">
                                <!-- Image -->
                                <img class="d-block mw-100 img-fit overflow-hidden h-sm-auto h-md-320px h-lg-460px overflow-hidden"
                                    src="https://taketalkbd.com/public/uploads/all/UWNxnShrIsmSFkFwqPZSLXEE85Wc54STgjQ1hsBD.jpg"
                                    alt="{{ env('APP_NAME')}} promo"
                                    onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder-rect.jpg') }}';">
                            </a>
                        </div>
                        <div class="carousel-box">
                            <a href="">
                                <!-- Image -->
                                <img class="d-block mw-100 img-fit overflow-hidden h-sm-auto h-md-320px h-lg-460px overflow-hidden"
                                    src="https://taketalkbd.com/public/uploads/all/2Z5Qw53N5JjuiVkNRXzwCig0oM5RNIaPEZWSGoSU.jpg"
                                    alt="Unboxing Tech promo"
                                    onerror="this.onerror=null;this.src='https://taketalkbd.com/public/assets/img/placeholder-rect.jpg';">
                            </a>
                        </div>
                        <div class="carousel-box">
                            <a href="">
                                <!-- Image -->
                                <img class="d-block mw-100 img-fit overflow-hidden h-sm-auto h-md-320px h-lg-460px overflow-hidden"
                                    src="https://taketalkbd.com/public/uploads/all/xD4NjAxDXj6P0NCRp6GxkRhfz3J4Bapwn4qcXvUl.jpg"
                                    alt="Unboxing Tech promo"
                                    onerror="this.onerror=null;this.src='https://taketalkbd.com/public/assets/img/placeholder-rect.jpg';">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    @php
        $flash_deal = \App\Models\FlashDeal::where('status', 1)->where('featured', 1)->first();
    @endphp
    @if($flash_deal != null && strtotime(date('Y-m-d H:i:s')) >= $flash_deal->start_date && strtotime(date('Y-m-d H:i:s')) <= $flash_deal->end_date)
    <section class="mb-2 mb-md-3 mt-2 mt-md-3">
        <div class="container">
            <!-- Top Section -->
            <div class="d-flex flex-wrap mb-2 mb-md-3 align-items-baseline justify-content-between">
                <!-- Title -->
                <h3 class="fs-16 fs-md-20 fw-700 mb-2 mb-sm-0">
                    <span class="d-inline-block">{{ translate('Flash Sale') }}</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="24" viewBox="0 0 16 24" class="ml-3">
                        <path id="Path_28795" data-name="Path 28795" d="M30.953,13.695a.474.474,0,0,0-.424-.25h-4.9l3.917-7.81a.423.423,0,0,0-.028-.428.477.477,0,0,0-.4-.207H21.588a.473.473,0,0,0-.429.263L15.041,18.151a.423.423,0,0,0,.034.423.478.478,0,0,0,.4.2h4.593l-2.229,9.683a.438.438,0,0,0,.259.5.489.489,0,0,0,.571-.127L30.9,14.164a.425.425,0,0,0,.054-.469Z" transform="translate(-15 -5)" fill="#fcc201"/>
                    </svg>
                </h3>
                <!-- Links -->
                <div>
                    <div class="text-dark d-flex align-items-center mb-0">
                        <a href="{{ route('flash-deals') }}" class="fs-10 fs-md-12 fw-700 text-reset has-transition opacity-60 hov-opacity-100 hov-text-primary animate-underline-primary mr-3">{{ translate('View All Flash Sale') }}</a>
                        <span class=" border-left border-soft-light border-width-2 pl-3">
                            <a href="{{ route('flash-deal-details', $flash_deal->slug) }}" class="fs-10 fs-md-12 fw-700 text-reset has-transition opacity-60 hov-opacity-100 hov-text-primary animate-underline-primary">{{ translate('View All Products from This Flash Sale') }}</a>
                        </span>
                    </div>
                </div>
            </div>

            <!-- Countdown for small device -->
            <div class="bg-white mb-3 d-md-none">
                <div class="aiz-count-down-circle" end-date="{{ date('Y/m/d H:i:s', $flash_deal->end_date) }}"></div>
            </div>

            <div class="row gutters-5 gutters-md-16">
                <!-- Flash Deals Baner & Countdown -->
                <div class="col-xxl-4 col-lg-5 col-6 h-200px h-md-400px h-lg-475px">
                    <div class="h-100 w-100 w-xl-auto" style="background-image: url('{{ uploaded_asset($flash_deal->banner) }}'); background-size: cover; background-position: center center;">
                        <div class="py-5 px-md-3 px-xl-5 d-none d-md-block">
                            <div class="bg-white">
                                <div class="aiz-count-down-circle" end-date="{{ date('Y/m/d H:i:s', $flash_deal->end_date) }}"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Flash Deals Products -->
                <div class="col-xxl-8 col-lg-7 col-6">
                    @php
                        $flash_deals = $flash_deal->flash_deal_products->take(10);
                    @endphp
                    <div class="aiz-carousel border-top @if(count($flash_deals)>8) border-right @endif arrow-inactive-none arrow-x-0" data-items="5" data-xxl-items="5" data-xl-items="3.5" data-lg-items="3" data-md-items="2" data-sm-items="2.5" data-xs-items="2" data-arrows="true" data-dots="false">
                        @php
                            $init = 0 ;
                            $end = 1 ;
                        @endphp
                        @for ($i = 0; $i < 5; $i++)
                            <div class="carousel-box  @if($i==0) border-left @endif">
                            @foreach ($flash_deals as $key => $flash_deal_product)
                                @if ($key >= $init && $key <= $end)
                                    @php
                                        $product = \App\Models\Product::find($flash_deal_product->product_id);
                                    @endphp
                                    @if ($product != null && $product->published != 0)
                                        @php
                                            $product_url = route('product', $product->slug);
                                            if($product->auction_product == 1) {
                                                $product_url = route('auction-product', $product->slug);
                                            }
                                        @endphp
                                        <div class="h-100px h-md-200px h-lg-auto flash-deal-item position-relative text-center border-bottom @if($i!=4) border-right @endif has-transition hov-shadow-out z-1">
                                            <a href="{{ $product_url }}" class="d-block py-md-3 overflow-hidden hov-scale-img" title="{{  $product->getTranslation('name')  }}">
                                                <!-- Image -->
                                                <img src="{{ uploaded_asset($product->thumbnail_img) }}" class="lazyload h-60px h-md-100px h-lg-140px mw-100 mx-auto has-transition"
                                                    alt="{{  $product->getTranslation('name')  }}" onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
                                                <!-- Price -->
                                                <div class="fs-10 fs-md-14 mt-md-3 text-center h-md-48px has-transition overflow-hidden pt-md-4 flash-deal-price">
                                                    <span class="d-block text-primary fw-700">{{ home_discounted_base_price($product) }}</span>
                                                    @if(home_base_price($product) != home_discounted_base_price($product))
                                                        <del class="d-block fw-400 text-secondary">{{ home_base_price($product) }}</del>
                                                    @endif
                                                </div>
                                            </a>
                                        </div>
                                    @endif
                                @endif
                            @endforeach
                        
                            @php
                                $init += 2;
                                $end += 2;
                            @endphp
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    <!-- Today's deal -->
    @if(count($todays_deal_products) > 0)
    <section class="mb-2 mb-md-3 mt-2 mt-md-3">
        <div class="container">
            <!-- Banner -->
            @if (get_setting('todays_deal_banner') != null || get_setting('todays_deal_banner_small') != null)
                <div class="overflow-hidden d-none d-md-block">
                    <img src="{{ static_asset('assets/img/placeholder-rect.jpg') }}" 
                        data-src="{{ uploaded_asset(get_setting('todays_deal_banner')) }}" 
                        alt="{{ env('APP_NAME') }} promo" class="lazyload img-fit h-100 has-transition" 
                        onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder-rect.jpg') }}';">
                </div>
                <div class="overflow-hidden d-md-none">
                    <img src="{{ static_asset('assets/img/placeholder-rect.jpg') }}" 
                        data-src="{{ get_setting('todays_deal_banner_small') != null ? uploaded_asset(get_setting('todays_deal_banner_small')) : uploaded_asset(get_setting('todays_deal_banner')) }}" 
                        alt="{{ env('APP_NAME') }} promo" class="lazyload img-fit h-100 has-transition" 
                        onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder-rect.jpg') }}';">
                </div>
            @endif
            <!-- Products -->
            <!--<div class="" style="background-color: {{ get_setting('todays_deal_bg_color', '#3d4666') }}">-->
            <!--    <div class="text-right px-4 px-xl-5 pt-4 pt-md-3">-->
            <!--        <a href="{{ route('todays-deal') }}" class="fs-12 fw-700 text-white has-transition hov-text-warning">{{ translate('View All') }}</a>-->
            <!--    </div>-->
            <!--    <div class="c-scrollbar-light overflow-hidden pl-5 pr-5 pb-3 pt-2 pb-md-5 pt-md-3">-->
            <!--        <div class="h-100 d-flex flex-column justify-content-center">-->
            <!--            <div class="todays-deal aiz-carousel" data-items="7" data-xxl-items="7" data-xl-items="6" data-lg-items="5" data-md-items="4" data-sm-items="3" data-xs-items="2" data-arrows="true" data-dots="false" data-autoplay="true" data-infinite="true">-->
            <!--                @foreach ($todays_deal_products as $key => $product)-->
            <!--                    <div class="carousel-box h-100 px-3 px-lg-0">-->
            <!--                        <a href="{{ route('product', $product->slug) }}" class="h-100 overflow-hidden hov-scale-img mx-auto" title="{{  $product->getTranslation('name')  }}">-->
                                        <!-- Image -->
            <!--                            <div class="img h-80px w-80px rounded-content overflow-hidden mx-auto">-->
            <!--                                <img class="lazyload img-fit m-auto has-transition"-->
            <!--                                    src="{{ static_asset('assets/img/placeholder.jpg') }}"-->
            <!--                                    data-src="{{ uploaded_asset($product->thumbnail_img) }}"-->
            <!--                                    alt="{{ $product->getTranslation('name') }}"-->
            <!--                                    onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">-->
            <!--                            </div>-->
                                        <!-- Price -->
            <!--                            <div class="fs-14 mt-3 text-center">-->
            <!--                                <span class="d-block text-white fw-700">{{ home_discounted_base_price($product) }}</span>-->
            <!--                                @if(home_base_price($product) != home_discounted_base_price($product))-->
            <!--                                    <del class="d-block text-secondary fw-400">{{ home_base_price($product) }}</del>-->
            <!--                                @endif-->
            <!--                            </div>-->
            <!--                        </a>-->
            <!--                    </div>-->
            <!--                @endforeach-->
            <!--            </div>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->
        </div>
    </section>
    @endif

<!-- Featured Categories -->
            <section class="mb-2 mb-md-3 mt-2 mt-md-3">
                <div class="container">
                    <div class="bg-white">
                        <!-- Top Section -->
                        <div class="d-flex mb-2 mb-md-3 align-items-baseline justify-content-between">
                            <!-- Title -->
                            <h3 class="fs-16 fs-md-20 fw-700 mb-2 mb-sm-0">
                                <!--<span class="">Categories</span>-->
                            </h3>
                            <!-- Links -->
                            <div class="d-flex">
                                <a class="fs-10 fs-md-12 fw-700 hov-text-primary animate-underline-primary" href="https://taketalkbd.com/">View All Categories</a>
                            </div>
                        </div>
                    </div>
                    <!-- Categories -->
                    <div class="bg-white px-sm-3">
                         @if (count($featured_categories) > 0)
                        <div class="aiz-carousel sm-gutters-17" data-items="8" data-xxl-items="8" data-xl-items="6" data-lg-items="5" data-md-items="4" data-sm-items="3" data-xs-items="2" data-arrows="true" data-dots="false" data-autoplay="true" data-infinite="true">
                            @foreach ($featured_categories as $key => $category)
                            <div class="carousel-box position-relative text-center border border-light duration-300 hover:box-shadow-sm bg-white bg-opacity-25 px-2 justify-between items-center rounded-2xl">
                                <a href="{{ route('products.category', $category->slug) }}" class="d-block">
                                    <img
                                    src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                    data-src="{{ uploaded_asset($category->banner) }}"
                                    alt="{{ $category->getTranslation('name') }}"
                                    class="lazyload" height="78px" style="margin-left: 35px;"
                                    onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder-rect.jpg') }}';"
                                >
                                </a>
                                <h6 class="text-dark mb-3 text-truncate-2">
                                    <a class="text-reset fw-700 fs-14 hov-text-primary" href="{{ route('products.category', $category->slug) }}" title="SmartPhone">{{ $category->getTranslation('name') }}</a>
                                </h6>
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
        </section>  





     <!-- Featured Products -->
    <div id="section_featured">

    </div>



    <!-- Best Selling  -->
    <div id="section_best_selling">

    </div>

  <!--  New Products -->
    <div id="section_newest">
        @if (count($newest_products) > 0)
            <section class="mb-2 mb-md-3 mt-2 mt-md-3">
                <!--<div class="bg-white" style="padding-top: 36px; padding-bottom:50px;">-->
                    <div class="container">
                         <!--Top Section -->
                        <div class="d-flex mb-2 mb-md-3 align-items-baseline justify-content-between">
                             <!--Title -->
                            <h3 class="fs-16 fs-md-20 fw-700 mb-2 mb-sm-0">
                                <span class="">{{ translate('New Products') }}</span>
                                <!--<a class="text-blue fs-10 fs-md-12 fw-700 hov-text-primary animate-underline-primary" href="https://demo.tigereyebd.com/search" style="border: 1px solid #5c6ac4; padding: 10px 30px; margin-left: 15px; color:#5c6ac4;">{{ translate('View All') }}</a>-->
                            </h3>
                             <div class="d-flex">
                                <a type="button" class="arrow-prev slide-arrow link-disable text-secondary mr-2" onclick="clickToSlide('slick-prev','section_newest')"><i class="las la-angle-left fs-20 fw-600"></i></a>
                                <a class="fs-10 fs-md-12 fw-700 hov-text-primary animate-underline-primary" href="https://unboxingtech.com.bd/search?sort_by=newest">View All</a>
                                <a type="button" class="arrow-next slide-arrow text-secondary ml-2" onclick="clickToSlide('slick-next','section_newest')"><i class="las la-angle-right fs-20 fw-600"></i></a>
                            </div>
                        </div>
                         <!--Products Section -->
                        <div class="px-sm-3">
                            <div class="aiz-carousel arrow-none sm-gutters-16" data-items="6" data-xl-items="5" data-lg-items="4"  data-md-items="3" data-sm-items="2" data-xs-items="2" data-arrows='true' data-infinite='false'>
                                @foreach ($newest_products as $key => $new_product)
                                <div class="carousel-box px-3 position-relative has-transition border border-light duration-300 hover:box-shadow-sm bg-white bg-opacity-25 justify-between items-center rounded-2xl @if($key == 0) @endif">
                                    @include('frontend.partials.product_box_1',['product' => $new_product])
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                <!--</div>-->
            </section>   
        @endif
    </div>

 {{-- Banner section 1 --}}
    @if (get_setting('home_banner1_images') != null)
    <div class="mb-4 mt-3">
        <div class="container">
            <div class="row gutters-10">
                @php $banner_1_imags = json_decode(get_setting('home_banner1_images')); @endphp
                @foreach ($banner_1_imags as $key => $value)
                    <div class="col-xl col-md-6">
                        <div class="mb-3 mb-lg-0">
                            <a href="{{ json_decode(get_setting('home_banner1_links'), true)[$key] }}" class="d-block text-reset">
                                <img src="{{ static_asset('assets/img/placeholder-rect.jpg') }}" data-src="{{ uploaded_asset($banner_1_imags[$key]) }}" alt="{{ env('APP_NAME') }} promo" class="img-fluid img-shadow lazyload w-100">
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif


    <div id="section_home_categories">

    </div>



@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $.post('{{ route('home.section.featured') }}', {_token:'{{ csrf_token() }}'}, function(data){
                $('#section_featured').html(data);
                AIZ.plugins.slickCarousel();
            });
            $.post('{{ route('home.section.best_selling') }}', {_token:'{{ csrf_token() }}'}, function(data){
                $('#section_best_selling').html(data);
                AIZ.plugins.slickCarousel();
            });
            $.post('{{ route('home.section.auction_products') }}', {_token:'{{ csrf_token() }}'}, function(data){
                $('#auction_products').html(data);
                AIZ.plugins.slickCarousel();
            });
            $.post('{{ route('home.section.home_categories') }}', {_token:'{{ csrf_token() }}'}, function(data){
                $('#section_home_categories').html(data);
                AIZ.plugins.slickCarousel();
            });
            $.post('{{ route('home.section.best_sellers') }}', {_token:'{{ csrf_token() }}'}, function(data){
                $('#section_best_sellers').html(data);
                AIZ.plugins.slickCarousel();
            });
        });
    </script>
@endsection
