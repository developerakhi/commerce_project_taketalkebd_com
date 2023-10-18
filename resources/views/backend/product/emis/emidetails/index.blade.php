@extends('backend.layouts.app')

@section('content')

<div class="aiz-titlebar text-left mt-2 mb-3">
	<div class="align-items-center">
		<h1 class="h3">EMI Details</h1>
	</div>
</div>

<div class="row">
	<div class="@if(auth()->user()->can('add_brand')) col-lg-7 @else col-lg-12 @endif">
		<div class="card">
		    <div class="card-header row gutters-5">
				<div class="col text-center text-md-left">
					<h5 class="mb-md-0 h6">{{$bank->bank_name}} EMI Packages</h5>
				</div>
				
		    </div>
		    <div class="card-body">
		        <table class="table aiz-table mb-0">
		            <thead>
		                <tr>
		                    <th>#</th>
		                    <th>Monthly</th>
		                    <th>EMI</th>
		                    <th>Effective Cost</th>
		                    <th>Percentage</th>
		                    <th class="text-right">Options</th>
		                </tr>
		            </thead>
		            <tbody>
		                @foreach($emis as $key => $emi)
		                    <tr>
		                        <td>{{ ($key+1) }}</td>
		                        <td>{{ $emi->monthly }}</td>
		                        <td>{{ $emi->emi }}</td>
		                        <td>{{ $emi->effective_cost }}</td>
		                        <td>{{ $emi->percentage }}</td>
								
		                        <td class="text-right">
										
										<a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{route('emis.detailsedit', $emi->id)}}" title="{{ translate('Edit') }}">
											<i class="las la-edit"></i>
										</a>
								
										<a href="{{route('emis.details.destroy', $emi->id)}}" class="btn btn-soft-danger btn-icon btn-circle btn-sm" title="{{ translate('Delete') }}">
											<i class="las la-trash"></i>
										</a>
									
		                        </td>
		                    </tr>
		                @endforeach
		            </tbody>
		        </table>
		        
		    </div>
		</div>
	</div>
	@can('add_brand')
		<div class="col-md-5">
			<div class="card">
				<div class="card-header">
					<h5 class="mb-0 h6">Add Package For {{$bank->bank_name}}</h5>
				</div>
				<div class="card-body">
					<form action="{{ route('emis.store') }}" method="POST">
						@csrf
						
						<div class="form-group mb-3">
							<label for="name">Plan (Monthly)</label>
							<input type="number" placeholder="Plan (Monthly)" name="monthly" class="form-control" required>
							<input type="hidden" name="bank_id" class="form-control" value="{{$bank->id}}">
						</div>
						<div class="form-group mb-3">
							<label for="name">EMI</label>
							<input type="number" placeholder="EMI" name="emi" class="form-control" required>
						</div>
						<div class="form-group mb-3">
							<label for="name">Effective Cost</label>
							<input type="number" placeholder="Effective Cost" name="effective_cost" class="form-control" required>
						</div>
						<div class="form-group mb-3">
							<label for="name">Percentage</label>
							<input type="text" placeholder="Percentage" name="percentage" class="form-control" required>
						</div>
						<div class="form-group mb-3 text-right">
							<button type="submit" class="btn btn-primary">Add</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	@endcan
</div>

@endsection

@section('modal')
    @include('modals.delete_modal')
@endsection

@section('script')
<script type="text/javascript">
    function sort_brands(el){
        $('#sort_brands').submit();
    }
</script>
@endsection
