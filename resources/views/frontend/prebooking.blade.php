@extends('frontend.layouts.app')

@section('content')
    <section class="pb-4 pt-5">
        <div class="container">
            <div class="row gutters-16">
                <!-- Contents -->
                <div class="col-xl-9 order-xl-1">
                    <!-- Breadcrumb -->
                    <div class="row gutters-16 mb-4">
                        <div class="col-5 col-xl-6">
                            <h1 class="fw-700 fs-20 fs-md-24 text-dark mb-0">{{ translate('Prebooking')}}</h1>
                        </div>
                        <div class="col-5 col-xl-6">
                            <ul class="breadcrumb bg-transparent p-0 justify-content-end">
                                <li class="breadcrumb-item has-transition opacity-60 hov-opacity-100">
                                    <a class="text-reset" href="{{ route('home') }}">
                                        {{ translate('Home')}}
                                    </a>
                                </li>
                                <li class="text-dark fw-600 breadcrumb-item">
                                   <a class="text-reset" href="{{ route('prebooking') }}"> "{{ translate('Prebooking') }}"</a>
                                </li>
                            </ul>
                        </div>
                </div>

            </div>
        </div>
    </section>
    <section class="">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        @if (session('status'))
                            <h6 class="alert alert-success">{{ session('status') }}</h6>
                        @endif
                        <div class="card-body">
                            <form role="form" action="{{ route('prebooking-store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                              <!-- 2 column grid layout with text inputs for the first and last names -->
                              @auth
                              <div class="row mb-4">
                                <div class="col">
                                  <div class="form-outline">
                                     <label class="form-label" for="form6Example1">Customer Name<span style="color: red;">*</span></label>
                                     <input type="text" name="customer_name" id="customer_name" class="form-control" value="{{ Auth::user()->name }}" required="required" data-error="name is required." />
                                  </div>
                                </div>
                                
                                <div class="row mb-4">
                                    <div class="col">
                                      <div class="form-outline">
                                         <label class="form-label" for="customer_mobile">Customer Mobile<span style="color: red;">*</span></label>
                                         <input type="text" name="customer_mobile" id="customer_mobile" class="form-control" value="{{ Auth::user()->phone }}" />
                                      </div>
                                    </div>
                                </div>
                            
                                <div class="col">
                                  <div class="form-outline">
                                     <label class="form-label" for="customer_email">Customer Email</label>
                                     <input type="email" id="customer_email" name="customer_email" class="form-control" value="{{ Auth::user()->email }}" required="required" data-error="Valid email is required." />
                                  </div>
                                </div>
                              </div>
                            
                            @else
                            
                             <div class="row mb-4">
                                <div class="col">
                                  <div class="form-outline">
                                     <label class="form-label" for="form6Example1">Customer Name<span style="color: red;">*</span></label>
                                     <input type="text" name="customer_name" id="customer_name" class="form-control"placeholder="Please enter your customer name *" required="required" data-error="name is required." />
                                  </div>
                                </div>
                                <div class="col">
                                  <div class="form-outline">
                                     <label class="form-label" for="customer_mobile">Customer Mobile<span style="color: red;">*</span></label>
                                     <input type="text" name="customer_mobile" id="customer_mobile" class="form-control" placeholder="Please enter your mobile number *" />
                                  </div>
                                </div>
                              </div>
                            
                            <div class="row mb-4">
                                <div class="col">
                                  <div class="form-outline">
                                     <label class="form-label" for="customer_email">Customer Email <span style="color: red;">*</span></label>
                                     <input type="email" id="customer_email" name="customer_email" class="form-control" placeholder="Please enter your email *" required="required" data-error="Valid email is required." />
                                  </div>
                                </div>
                            </div>
                            @endauth
                            
                            <div class="row mb-4">
                                <div class="col">
                                    <div class="form-outline">
                                        <label class="form-label" for="item_name">Product Name</label>
                                        <input type="text" name="item_name" id="item_name" class="form-control" placeholder="Please enter your item name" />
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row mb-4">
                                <div class="col">
                                    
                                    <table class="table table-bordered" id="dynamic_field">
                                        <div class="card-header">
                                          <h3 class="card-title" style="color:red; font-size: 16px; margin-left: -24px;">Product Images (Click Add For More Image)</h3>
                                        </div> 
                                          <tr>  
                                              <td><input type="file" accept="image/*" name="image[]" class="form-control name_list" /></td>  
                                              <td><button type="button" name="add" id="add" class="btn btn-success">Add</button></td>  
                                          </tr>  
                                    </table> 
                               
                                    <!--<div class="form-outline">-->
                                    <!--    <label class="form-label" for="image">Upload Image</label>-->
                                    <!--    <input type="file" name="image[]" multiple id="image[]" class="form-control" />-->
                                    <!--</div>-->
                                </div>
                            </div>
                            
                              <div class="form-outline mb-4">
                                <label class="form-label" for="description">Product Description</label>
                                <textarea class="form-control" type="text" name="description" id="description" rows="4" placeholder="something text here..."></textarea>
                              </div>
          
                              <!-- Submit button -->
                              <button type="submit" class="btn btn-primary btn-block mb-4">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script type="text/javascript">
        function filter(){
            $('#search-form').submit();
        }
        
        
        $(document).ready(function(){      
           
           var i=1;  
           $('#add').click(function(){  
                i++;  
                $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="file" accept="image/*" name="image[]" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
           });
           
           $(document).on('click', '.btn_remove', function(){  
                var button_id = $(this).attr("id");   
                $('#row'+button_id+'').remove();  
           });  
         }); 
         
    </script>
    
@endsection
