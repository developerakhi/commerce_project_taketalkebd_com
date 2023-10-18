@php
    if (auth()->user() != null) {
        $user_id = Auth::user()->id;
        $cart = \App\Models\Cart::where('user_id', $user_id)->get();
    } else {
        $temp_user_id = Session()->get('temp_user_id');
        if ($temp_user_id) {
            $cart = \App\Models\Cart::where('temp_user_id', $temp_user_id)->get();
        }
    }
    
    $cart_added = [];
    if (isset($cart) && count($cart) > 0) {
        $cart_added = $cart->pluck('product_id')->toArray();
    }
@endphp

<div class="d-none d-lg-block">
    <div class="item bg-white align-items shadow-sm shadow-lg" >
        <a href="">
            <img src="https://rasanasa.com/public/uploads/all/z9Fmxa2CxLg8XmBuQWW4A9aMJbramkElZK2YWWHG.png" style="height:250px; width:250px; margin-left: -15px;"/>
        </a>
        <div class="name-taka">
            <p class="watch">Goldenhour Watch</p>
            <p class="taka">৳6,000.00</p>
        </div>
        <div class="social-icon">
            <span class="hours" id="hour"><i class="fa-solid fa-heart" style="font-size:18px;"></i></span>
            <span class="minutes" id="minute"><i class="fa-solid fa-basket-shopping" style="font-size:18px;"></i></span>
            <span class="btn-clss btn btn-success btn-sm">Buy Now</span>
        </div>
    </div>
    </div>
    <div class="d-none d-lg-block">
    <div class="item bg-white align-items shadow-sm shadow-lg" >
        <a href="">
            <img src="https://rasanasa.com/public/uploads/all/z9Fmxa2CxLg8XmBuQWW4A9aMJbramkElZK2YWWHG.png" style="height:250px; width:250px; margin-left: -15px;"/>
        </a>
        <div class="name-taka">
            <p class="watch">Goldenhour Watch</p>
            <p class="taka">৳6,000.00</p>
        </div>
        <div class="social-icon">
            <span class="hours" id="hour"><i class="fa-solid fa-heart" style="font-size:18px;"></i></span>
            <span class="minutes" id="minute"><i class="fa-solid fa-basket-shopping" style="font-size:18px;"></i></span>
            <span class="btn-clss btn btn-success btn-sm">Buy Now</span>
        </div>
    </div>
    </div>
    <div class="d-none d-lg-block">
    <div class="item bg-white align-items shadow-sm shadow-lg" >
        <a href="">
            <img src="https://rasanasa.com/public/uploads/all/z9Fmxa2CxLg8XmBuQWW4A9aMJbramkElZK2YWWHG.png" style="height:250px; width:250px; margin-left: -15px;"/>
        </a>
        <div class="name-taka">
            <p class="watch">Goldenhour Watch</p>
            <p class="taka">৳6,000.00</p>
        </div>
        <div class="social-icon">
            <span class="hours" id="hour"><i class="fa-solid fa-heart" style="font-size:18px;"></i></span>
            <span class="minutes" id="minute"><i class="fa-solid fa-basket-shopping" style="font-size:18px;"></i></span>
            <span class="btn-clss btn btn-success btn-sm">Buy Now</span>
        </div>
    </div>
    </div>
    <div class="d-none d-lg-block">
    <div class="item bg-white align-items shadow-sm shadow-lg" >
        <a href="">
            <img src="https://rasanasa.com/public/uploads/all/z9Fmxa2CxLg8XmBuQWW4A9aMJbramkElZK2YWWHG.png" style="height:250px; width:250px; margin-left: -15px;"/>
        </a>
        <div class="name-taka">
            <p class="watch">Goldenhour Watch</p>
            <p class="taka">৳6,000.00</p>
        </div>
        <div class="social-icon">
            <a href="javascript:void(0)"><span class="hours" id="hour"><i class="fa-solid fa-heart" style="font-size:18px;"></i></span></a>
            <a class="" href="javascript:void(0)" onclick="showAddToCartModal({{ $product->id }})" onclick="showLoginModal()"><span class="minutes" id="minute"><i class="fa-solid fa-basket-shopping" style="font-size:18px;"></i></span></a>
            <a href="javascript:void(0)"><span class="btn-clss btn btn-success btn-sm">Buy Now</span></a>
        </div>
    </div>
    </div>