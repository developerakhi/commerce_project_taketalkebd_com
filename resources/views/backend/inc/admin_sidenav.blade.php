<div class="aiz-sidebar-wrap">
    <div class="aiz-sidebar left c-scrollbar">
        <div class="aiz-side-nav-logo-wrap">
            <a href="{{ route('admin.dashboard') }}" class="d-block text-left">
                @if(get_setting('system_logo_white') != null)
                    <img class="mw-100" src="https://taketalkbd.com/public/uploads/all/FTnZonuP1ywY7ouSumLHLBtikxIrObC1ENeYFiIc.png" class="brand-icon" alt="" style="margin-left: 30px;">
                @else
                    <img class="mw-100" src="https://taketalkbd.com/public/uploads/all/FTnZonuP1ywY7ouSumLHLBtikxIrObC1ENeYFiIc.png" class="brand-icon" alt="" style="margin-left: 30px;">
                @endif
            </a>
        </div>
        <div class="aiz-side-nav-wrap">
            <div class="px-20px mb-3">
                <input class="form-control bg-soft-secondary border-0 form-control-sm text-white" type="text" name="" placeholder="{{ translate('Search in menu') }}" id="menu-search" onkeyup="menuSearch()">
            </div>
            <ul class="aiz-side-nav-list" id="search-menu">
            </ul>
            <ul class="aiz-side-nav-list" id="main-menu" data-toggle="aiz-side-menu">
                
                {{-- Dashboard --}}
                @can('admin_dashboard')
                    <li class="aiz-side-nav-item">
                        <a href="{{route('admin.dashboard')}}" class="aiz-side-nav-link">
                            <i class="las la-home aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">{{translate('Dashboard')}}</span>
                        </a>
                    </li>
                @endcan


                <!-- Product -->
                @canany(['add_new_product', 'show_all_products','show_in_house_products','show_seller_products','show_digital_products','product_bulk_import','product_bulk_export','view_product_categories', 'view_all_brands','view_product_attributes','view_colors','view_product_reviews'])
                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-shopping-cart aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">{{translate('Products')}}</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <!--Submenu-->
                        <ul class="aiz-side-nav-list level-2">
                            @can('add_new_product')
                                <li class="aiz-side-nav-item">
                                    <a class="aiz-side-nav-link" href="{{route('products.create')}}">
                                        <span class="aiz-side-nav-text">{{translate('Add New product')}}</span>
                                    </a>
                                </li>
                            @endcan
                            @can('show_all_products')
                                <li class="aiz-side-nav-item">
                                    <a href="{{route('products.all')}}" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">{{ translate('All Products') }}</span>
                                    </a>
                                </li>
                            @endcan
                            @can('show_in_house_products')
                                <li class="aiz-side-nav-item">
                                    <a href="{{route('products.admin')}}" class="aiz-side-nav-link {{ areActiveRoutes(['products.admin', 'products.create', 'products.admin.edit']) }}" >
                                        <span class="aiz-side-nav-text">{{ translate('In House Products') }}</span>
                                    </a>
                                </li>
                            @endcan
                            @if(get_setting('vendor_system_activation') == 1)
                                @can('show_seller_products')
                                    <li class="aiz-side-nav-item">
                                        <a href="{{route('products.seller')}}" class="aiz-side-nav-link {{ areActiveRoutes(['products.seller', 'products.seller.edit']) }}">
                                            <span class="aiz-side-nav-text">{{ translate('Seller Products') }}</span>
                                        </a>
                                    </li>
                                @endcan
                            @endif
                            @can('show_digital_products')
                                <li class="aiz-side-nav-item">
                                    <a href="{{route('digitalproducts.index')}}" class="aiz-side-nav-link {{ areActiveRoutes(['digitalproducts.index', 'digitalproducts.create', 'digitalproducts.edit']) }}">
                                        <span class="aiz-side-nav-text">{{ translate('Digital Products') }}</span>
                                    </a>
                                </li>
                            @endcan
                         
                            @can('product_bulk_export')
                                <li class="aiz-side-nav-item">
                                    <a href="{{route('product_bulk_export.index')}}" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">{{translate('Bulk Export')}}</span>
                                    </a>
                                </li>
                            @endcan
                            @can('view_product_categories')
                                <li class="aiz-side-nav-item">
                                    <a href="{{route('categories.index')}}" class="aiz-side-nav-link {{ areActiveRoutes(['categories.index', 'categories.create', 'categories.edit'])}}">
                                        <span class="aiz-side-nav-text">{{translate('Category')}}</span>
                                    </a>
                                </li>
                            @endcan
                            @can('view_all_brands')
                                <li class="aiz-side-nav-item">
                                    <a href="{{route('brands.index')}}" class="aiz-side-nav-link {{ areActiveRoutes(['brands.index', 'brands.create', 'brands.edit'])}}" >
                                        <span class="aiz-side-nav-text">{{translate('Brand')}}</span>
                                    </a>
                                </li>
                            @endcan
                            
                                <li class="aiz-side-nav-item">
                                    <a href="{{route('emis.index')}}" class="aiz-side-nav-link {{ areActiveRoutes(['emis.index'])}}" >
                                        <span class="aiz-side-nav-text">EMI Bank List</span>
                                    </a>
                                </li>
                                
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('all_prebooking.index') }}" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">All Prebooking</span>
                                    </a>
                                </li>
                            
                            @can('view_product_attributes')
                                <li class="aiz-side-nav-item">
                                    <a href="{{route('attributes.index')}}" class="aiz-side-nav-link {{ areActiveRoutes(['attributes.index','attributes.create','attributes.edit','attributes.show','edit-attribute-value'.''])}}">
                                        <span class="aiz-side-nav-text">{{translate('Attribute')}}</span>
                                    </a>
                                </li>
                            @endcan
                            @can('view_colors')
                                <li class="aiz-side-nav-item">
                                    <a href="{{route('colors')}}" class="aiz-side-nav-link {{ areActiveRoutes(['colors','colors.edit'])}}">
                                        <span class="aiz-side-nav-text">{{translate('Colors')}}</span>
                                    </a>
                                </li>
                            @endcan
                            @can('view_product_reviews')
                                <li class="aiz-side-nav-item">
                                    <a href="{{route('reviews.index')}}" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">{{translate('Product Reviews')}}</span>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcanany


                <!-- Sale -->
                @canany(['view_all_orders', 'view_inhouse_orders','view_seller_orders','view_pickup_point_orders'])
                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-money-bill aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">{{translate('Sales')}}</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <!--Submenu-->
                        <ul class="aiz-side-nav-list level-2">
                            @can('view_all_orders')
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('all_orders.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['all_orders.index', 'all_orders.show'])}}">
                                        <span class="aiz-side-nav-text">{{translate('All Orders')}}</span>
                                    </a>
                                </li>
                            @endcan
                            @can('view_inhouse_orders')
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('inhouse_orders.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['inhouse_orders.index', 'inhouse_orders.show'])}}" >
                                        <span class="aiz-side-nav-text">{{translate('Inhouse orders')}}</span>
                                    </a>
                                </li>
                            @endcan

                        </ul>
                    </li>
                @endcanany


                <!-- Customers -->
                @canany(['view_all_customers','view_classified_products','view_classified_packages'])
                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-user-friends aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">{{ translate('Customers') }}</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                            @can('view_all_customers')
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('customers.index') }}" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">{{ translate('Customer list') }}</span>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcanany

                <!-- Sellers -->
                @canany(['view_all_seller','seller_payment_history','view_seller_payout_requests','seller_commission_configuration','view_all_seller_packages','seller_verification_form_configuration'])
                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-user aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">{{ translate('Sellers') }}</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                            @can('view_all_seller')
                                <li class="aiz-side-nav-item">
                                    @php
                                        $sellers = \App\Models\Shop::where('verification_status', 0)->where('verification_info', '!=', null)->count();
                                    @endphp
                                    <a href="{{ route('sellers.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['sellers.index', 'sellers.create', 'sellers.edit', 'sellers.payment_history','sellers.approved','sellers.profile_modal','sellers.show_verification_request'])}}">
                                        <span class="aiz-side-nav-text">{{ translate('All Seller') }}</span>
                                        @if($sellers > 0)<span class="badge badge-info">{{ $sellers }}</span> @endif
                                    </a>
                                </li>
                            @endcan
                            @can('seller_payment_history')
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('sellers.payment_histories') }}" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">{{ translate('Payouts') }}</span>
                                    </a>
                                </li>
                            @endcan
                            @can('view_seller_payout_requests')
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('withdraw_requests_all') }}" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">{{ translate('Payout Requests') }}</span>
                                    </a>
                                </li>
                            @endcan
                            @can('seller_commission_configuration')
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('business_settings.vendor_commission') }}" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">{{ translate('Seller Commission') }}</span>
                                    </a>
                                </li>
                            @endcan
                           
                            @can('seller_verification_form_configuration')
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('seller_verification_form.index') }}" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">{{ translate('Seller Verification Form') }}</span>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcanany

                {{-- Uploads Files --}}
                <li class="aiz-side-nav-item">
                    <a href="{{ route('uploaded-files.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['uploaded-files.create'])}}">
                        <i class="las la-folder-open aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">{{ translate('Uploaded Files') }}</span>
                    </a>
                </li>

                <!-- Reports -->
                @canany(['in_house_product_sale_report','seller_products_sale_report','products_stock_report','product_wishlist_report','user_search_report','commission_history_report','wallet_transaction_report'])
                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-file-alt aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">{{ translate('Reports') }}</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                            @can('in_house_product_sale_report')
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('in_house_sale_report.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['in_house_sale_report.index'])}}">
                                        <span class="aiz-side-nav-text">{{ translate('In House Product Sale') }}</span>
                                    </a>
                                </li>
                            @endcan
                            @can('seller_products_sale_report')
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('seller_sale_report.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['seller_sale_report.index'])}}">
                                        <span class="aiz-side-nav-text">{{ translate('Seller Products Sale') }}</span>
                                    </a>
                                </li>
                            @endcan
                            @can('products_stock_report')
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('stock_report.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['stock_report.index'])}}">
                                        <span class="aiz-side-nav-text">{{ translate('Products Stock') }}</span>
                                    </a>
                                </li>
                            @endcan
                            @can('product_wishlist_report')
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('wish_report.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['wish_report.index'])}}">
                                        <span class="aiz-side-nav-text">{{ translate('Products wishlist') }}</span>
                                    </a>
                                </li>
                            @endcan
                            @can('user_search_report')
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('user_search_report.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['user_search_report.index'])}}">
                                        <span class="aiz-side-nav-text">{{ translate('User Searches') }}</span>
                                    </a>
                                </li>
                            @endcan
                            @can('commission_history_report')
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('commission-log.index') }}" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">{{ translate('Commission History') }}</span>
                                    </a>
                                </li>
                            @endcan
                          
                        </ul>
                    </li>
                @endcanany
                
                <!--Blog System-->
                @canany(['view_blogs','view_blog_categories'])
                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-bullhorn aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">{{ translate('Blog System') }}</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                            @can('view_blogs')
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('blog.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['blog.create', 'blog.edit'])}}">
                                        <span class="aiz-side-nav-text">{{ translate('All Posts') }}</span>
                                    </a>
                                </li>
                            @endcan
                            @can('view_blog_categories')
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('blog-category.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['blog-category.create', 'blog-category.edit'])}}">
                                        <span class="aiz-side-nav-text">{{ translate('Categories') }}</span>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcanany

                <!-- marketing -->
                @canany(['view_all_flash_deals','send_newsletter','send_bulk_sms','view_all_subscribers','view_all_coupons'])
                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-bullhorn aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">{{ translate('Marketing') }}</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                            @can('view_all_flash_deals')
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('flash_deals.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['flash_deals.index', 'flash_deals.create', 'flash_deals.edit'])}}">
                                        <span class="aiz-side-nav-text">{{ translate('Flash deals') }}</span>
                                    </a>
                                </li>
                            @endcan
                            @can('send_newsletter')
                                <li class="aiz-side-nav-item">
                                    <a href="{{route('newsletters.index')}}" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">{{ translate('Newsletters') }}</span>
                                    </a>
                                </li>
                            @endcan
                            @can('view_all_subscribers')
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('subscribers.index') }}" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">{{ translate('Subscribers') }}</span>
                                    </a>
                                </li>
                            @endcan
                            @if (get_setting('coupon_system') == 1 && auth()->user()->can('view_all_coupons') )
                            <li class="aiz-side-nav-item">
                                <a href="{{route('coupon.index')}}" class="aiz-side-nav-link {{ areActiveRoutes(['coupon.index','coupon.create','coupon.edit'])}}">
                                    <span class="aiz-side-nav-text">{{ translate('Coupon') }}</span>
                                </a>
                            </li>
                            @endif
                        </ul>
                    </li>
                @endcanany

                <!-- Support -->
                @canany(['view_all_support_tickets','view_all_product_conversations','view_all_product_queries'])
                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-link aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">{{translate('Support')}}</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                            @can('view_all_support_tickets')
                                @php
                                    $support_ticket = DB::table('tickets')
                                                ->where('viewed', 0)
                                                ->select('id')
                                                ->count();
                                @endphp
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('support_ticket.admin_index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['support_ticket.admin_index', 'support_ticket.admin_show'])}}">
                                        <span class="aiz-side-nav-text">{{translate('Ticket')}}</span>
                                        @if($support_ticket > 0)<span class="badge badge-info">{{ $support_ticket }}</span>@endif
                                    </a>
                                </li>
                            @endcan
                            
                            @can('view_all_product_conversations')
                                @php
                                    $conversation = \App\Models\Conversation::where('receiver_id', Auth::user()->id)->where('receiver_viewed', '1')->get();
                                @endphp
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('conversations.admin_index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['conversations.admin_index', 'conversations.admin_show'])}}">
                                        <span class="aiz-side-nav-text">{{translate('Product Conversations')}}</span>
                                        @if (count($conversation) > 0)
                                            <span class="badge badge-info">{{ count($conversation) }}</span>
                                        @endif
                                    </a>
                                </li>
                            @endcan
                            @if (get_setting('product_query_activation') == 1)
                                @can('view_all_product_queries')
                                    <li class="aiz-side-nav-item">
                                        <a href="{{ route('product_query.index') }}"
                                            class="aiz-side-nav-link {{ areActiveRoutes(['product_query.index','product_query.show']) }}">
                                            <span class="aiz-side-nav-text">{{ translate('Product Queries') }}</span>                           
                                        </a>
                                    </li>
                                @endcan
                            @endif
                        </ul>
                    </li>
                @endcanany

                

              
                <!-- Website Setup -->
                @canany(['header_setup','footer_setup','view_all_website_pages','website_appearance'])
                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link {{ areActiveRoutes(['website.footer', 'website.header'])}}" >
                            <i class="las la-desktop aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">{{translate('Website Setup')}}</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                            @can('header_setup')
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('website.header') }}" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">{{translate('Header')}}</span>
                                    </a>
                                </li>
                            @endcan
                            @can('footer_setup')
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('website.footer', ['lang'=>  App::getLocale()] ) }}" class="aiz-side-nav-link {{ areActiveRoutes(['website.footer'])}}">
                                        <span class="aiz-side-nav-text">{{translate('Footer')}}</span>
                                    </a>
                                </li>
                            @endcan
                            @can('view_all_website_pages')
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('website.pages') }}" class="aiz-side-nav-link {{ areActiveRoutes(['website.pages', 'custom-pages.create' ,'custom-pages.edit'])}}">
                                        <span class="aiz-side-nav-text">{{translate('Pages')}}</span>
                                    </a>
                                </li>
                            @endcan
                            @can('website_appearance')
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('website.appearance') }}" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">{{translate('Appearance')}}</span>
                                    </a>
                                </li>
                            @endcan
                            <!--
                            <li class="aiz-side-nav-item">
                                 <a href="{{route('activation.index')}}" class="aiz-side-nav-link">
                                  <span class="aiz-side-nav-text">{{translate('Payment activation')}}</span>
                                 </a>
                            </li>
                            -->
                        </ul>
                    </li>
                @endcanany

             

                <!-- Staffs -->
                @canany(['view_all_staffs','view_staff_roles'])
                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-user-tie aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">{{translate('Staffs')}}</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                            @can('view_all_staffs')
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('staffs.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['staffs.index', 'staffs.create', 'staffs.edit'])}}">
                                        <span class="aiz-side-nav-text">{{translate('All staffs')}}</span>
                                    </a>
                                </li>
                            @endcan
                            @can('view_staff_roles')
                                <li class="aiz-side-nav-item">
                                    <a href="{{route('roles.index')}}" class="aiz-side-nav-link {{ areActiveRoutes(['roles.index', 'roles.create', 'roles.edit'])}}">
                                        <span class="aiz-side-nav-text">{{translate('Staff permissions')}}</span>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcanany
                
            </ul><!-- .aiz-side-nav -->
        </div><!-- .aiz-side-nav-wrap -->
    </div><!-- .aiz-sidebar -->
    <div class="aiz-sidebar-overlay"></div>
</div><!-- .aiz-sidebar -->
