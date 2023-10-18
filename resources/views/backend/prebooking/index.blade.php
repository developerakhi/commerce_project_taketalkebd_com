@extends('backend.layouts.app')

@section('content')

<div class="card">
    <form class="" action="" id="sort_orders" method="GET">
        <div class="card-header row gutters-5">
            <div class="col">
                <h5 class="mb-md-0 h6">All Prebooking</h5>
            </div>

           
                <div class="dropdown mb-2 mb-md-0">
                    <button class="btn border dropdown-toggle" type="button" data-toggle="dropdown">
                        {{translate('Bulk Action')}}
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#" onclick="bulk_delete()"> {{translate('Delete selection')}}</a>
                    </div>
                </div>
         

            
            <div class="col-lg-2">
                <div class="form-group mb-0">
                    <input type="text" class="aiz-date-range form-control" value="" name="date" placeholder="" data-format="DD-MM-Y" data-separator=" to " data-advanced-range="true" autocomplete="off">
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group mb-0">
                    <input type="text" class="form-control" id="search" name="search"@isset($sort_search) value="{{ $sort_search }}" @endisset placeholder="{{ translate('Type Order code & hit Enter') }}">
                </div>
            </div>
            <div class="col-auto">
                <div class="form-group mb-0">
                    <button type="submit" class="btn btn-primary"></button>
                </div>
            </div>
        </div>

        <div class="card-body">
            <table class="table aiz-table mb-0">
                <thead>
                    <tr>
                        <!--<th>#</th>-->
                       
                        <th>
                            <div class="form-group">
                                <div class="aiz-checkbox-inline">
                                    <label class="aiz-checkbox">
                                        <input type="checkbox" class="check-all">
                                        <span class="aiz-square-check"></span>
                                    </label>
                                </div>
                            </div>
                        </th>
                        <th data-breakpoints="lg">#</th>
                        <th data-breakpoints="md">Product Image</th>
                        <th data-breakpoints="md">Customer Name</th>
                        <th data-breakpoints="md">Customer Mobile</th>
                        <th data-breakpoints="md">Product Email</th>
                        <th data-breakpoints="md">Product Description</th>

                        <th class="text-right" width="15%">Option</th>
                    </tr>
                </thead>
                <tbody>
                   @foreach ($prebookings as $key => $prebooking)
                    <tr>
                        <td>
                            <div class="form-group">
                                <div class="aiz-checkbox-inline">
                                    <label class="aiz-checkbox">
                                        <input type="checkbox" class="check-one" name="" value="">
                                        <span class="aiz-square-check"></span>
                                    </label>
                                </div>
                            </div>
                        </td>
                        <td>{{ ($key+1) + ($prebookings->currentPage() - 1)*$prebookings->perPage() }}</td>
                        <td>
                            @php
                                $images= json_decode($prebooking->image,true);
                            @endphp
                            <div class="row gutters-5 w-200px w-md-300px mw-100">
                                <div class="col-auto">
                                    @foreach($images as $key => $image)
                                    
                                    <img src="../public/uploads/preorder/{{ $image }}" alt="Image" class="size-50px img-fit">
                                  
                                    @endforeach
                                </div>
                            </div>
                        </td>
                        
                        <td>{{ $prebooking->customer_name }}</td>
                        <td>{{ $prebooking->customer_mobile }}</td>
                        <td>{{ $prebooking->customer_email }}</td>
                        <td>{{ $prebooking->description }}</td>

                        <td class="text-right">
                            <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{ route('all_prebooking.show', $prebooking->id)}}"  title="show">
                                <i class="las la-eye"></i>
                            </a>
                           
                            <!--<a class="btn btn-soft-info btn-icon btn-circle btn-sm" href="" title="">-->
                            <!--    <i class="las la-download"></i>-->
                            <!--</a>-->
                            <a href="{{route('all_prebooking.destroy', $prebooking->id)}}" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="{{route('all_prebooking.destroy', $prebooking->id)}}" title="">
                                <i class="las la-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="aiz-pagination">
                {{ $prebookings->appends(request()->input())->links() }}
            </div>

        </div>
    </form>
</div>

@endsection

@section('modal')
    @include('modals.delete_modal')
@endsection

@section('script')
    <script type="text/javascript">
        $(document).on("change", ".check-all", function() {
            if(this.checked) {
                // Iterate each checkbox
                $('.check-one:checkbox').each(function() {
                    this.checked = true;
                });
            } else {
                $('.check-one:checkbox').each(function() {
                    this.checked = false;
                });
            }

        });

//        function change_status() {
//            var data = new FormData($('#order_form')[0]);
//            $.ajax({
//                headers: {
//                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//                },
//                url: "{{route('bulk-order-status')}}",
//                type: 'POST',
//                data: data,
//                cache: false,
//                contentType: false,
//                processData: false,
//                success: function (response) {
//                    if(response == 1) {
//                        location.reload();
//                    }
//                }
//            });
//        }

        function bulk_delete() {
            var data = new FormData($('#sort_orders')[0]);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{route('bulk-order-delete')}}",
                type: 'POST',
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                success: function (response) {
                    if(response == 1) {
                        location.reload();
                    }
                }
            });
        }
    </script>
@endsection
