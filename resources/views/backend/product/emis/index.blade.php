@extends('backend.layouts.app')

@section('content')

<div class="aiz-titlebar text-left mt-2 mb-3">
	<div class="align-items-center">
		<h1 class="h3">All EMI</h1>
	</div>
</div>

<div class="row">
	<div class="@if(auth()->user()->can('add_brand')) col-lg-7 @else col-lg-12 @endif">
		<div class="card">
		    <div class="card-header row gutters-5">
				<div class="col text-center text-md-left">
					<h5 class="mb-md-0 h6">EMI</h5>
				</div>
				<div class="col-md-4">
					<form class="" id="sort_brands" action="" method="GET">
						<div class="input-group input-group-sm">
					  		<input type="text" class="form-control" id="search" name="search"@isset($sort_search) value="{{ $sort_search }}" @endisset placeholder="{{ translate('Type name & Enter') }}">
						</div>
					</form>
				</div>
		    </div>
		    <div class="card-body">
		        <table class="table aiz-table mb-0">
		            <thead>
		                <tr>
		                    <th>#</th>
		                    <th>{{translate('Name')}}</th>
		                    <th class="text-right">{{translate('Options')}}</th>
		                </tr>
		            </thead>
		            <tbody>
		                @foreach($emis as $key => $emi)
		                    <tr>
		                        <td>{{ ($key+1) + ($emis->currentPage() - 1)*$emis->perPage() }}</td>
		                        <td>{{ $emi->bank_name }}</td>
								
		                        <td class="text-right">
									<a class="btn btn-soft-info btn-icon btn-circle btn-sm" href="{{route('emis.show', $emi->id )}}" title="View">
										<i class="las la-eye"></i>
									</a>
									<a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{route('emis.edit', $emi->id)}}" title="{{ translate('Edit') }}">
										<i class="las la-edit"></i>
									</a>
							
									<a href="{{route('emis.destroy', $emi->id)}}" class="btn btn-soft-danger btn-icon btn-circle btn-sm "  title="{{ translate('Delete') }}">
										<i class="las la-trash"></i>
									</a>
		                        </td>
		                    </tr>
		                @endforeach
		            </tbody>
		        </table>
		        <div class="aiz-pagination">
                	{{ $emis->appends(request()->input())->links() }}
            	</div>
		    </div>
		</div>
	</div>
	@can('add_brand')
		<div class="col-md-5">
			<div class="card">
				<div class="card-header">
					<h5 class="mb-0 h6">{{ translate('Add New Bank') }}</h5>
				</div>
				<div class="card-body">
					<form action="{{ route('bank.store') }}" method="POST">
						@csrf
						<div class="form-group mb-3">
							<label for="name">Bank Name</label>
							<input type="text" placeholder="Bank Name" name="bank_name" class="form-control" required>
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
