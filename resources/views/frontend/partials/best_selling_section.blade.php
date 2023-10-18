@php
    $best_selling_products = Cache::remember('best_selling_products', 86400, function () {
        return filter_products(\App\Models\Product::orderBy('num_of_sale', 'desc'))->limit(20)->get();
    });   
@endphp

@if (get_setting('best_selling') == 1 && count($best_selling_products) > 0)
    <section class="mb-2 mb-md-3 mt-2 mt-md-3">
        <!--<div class="bg-white" style="padding-top: 36px; padding-bottom:50px;">-->
            <div class="container">
                <!-- Top Section -->
                <div class="d-flex mb-2 mb-md-3 align-items-baseline justify-content-between">
                    <!-- Title -->
                    <h3 class="fs-16 fs-md-20 fw-700 mb-2 mb-sm-0">
                        <span class="">{{ translate('Best Selling') }}</span>
                        <!--<a class="text-blue fs-10 fs-md-12 fw-700 hov-text-primary animate-underline-primary" href="https://demo.tigereyebd.com/search" style="border: 1px solid #5c6ac4; padding: 10px 30px; margin-left: 15px; color:#5c6ac4;">{{ translate('View All') }}</a>-->
                    </h3>
                    <div class="d-flex">
                        <a type="button" class="arrow-prev slide-arrow link-disable text-secondary mr-2" onclick="clickToSlide('slick-prev','section_featured')"><i class="las la-angle-left fs-20 fw-600"></i></a>
                        <a type="button" class="arrow-next slide-arrow text-secondary ml-2" onclick="clickToSlide('slick-next','section_featured')"><i class="las la-angle-right fs-20 fw-600"></i></a>
                    </div>
                </div>
                <!-- Product Section -->
                <div class="px-sm-3">
                    <div class="aiz-carousel sm-gutters-16 arrow-none" data-items="6" data-xl-items="5" data-lg-items="4"  data-md-items="3" data-sm-items="2" data-xs-items="2" data-arrows='true' data-infinite='false'>
                        @foreach ($best_selling_products as $key => $product)
                            <div class="carousel-box px-3 position-relative has-transition border border-light duration-300 hover:box-shadow-sm bg-white bg-opacity-25 justify-between items-center rounded-2xl @if($key == 0) @endif">
                                @include('frontend.partials.product_box_1',['product' => $product])
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        <!--</div>-->
    </section>
@endif
