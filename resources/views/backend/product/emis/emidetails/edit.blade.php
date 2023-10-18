@extends('backend.layouts.app')

@section('content')

<div class="aiz-titlebar text-left mt-2 mb-3">
    <h5 class="mb-0 h6">Bank Name</h5>
</div>

<div class="col-lg-8 mx-auto">
    <div class="card">
        <div class="card-body p-0">
            
            <form class="p-4" action="{{ route('emis.bankdetailsUpdate', $emis->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
					<label for="name">Plan (Monthly)</label>
					<input type="number" placeholder="Plan (Monthly)" name="monthly" id="monthly" value="{{$emis->monthly}}" class="form-control" required>
				</div>
				<div class="form-group mb-3">
					<label for="name">EMI</label>
					<input type="number" placeholder="EMI" name="emi" id="emi" value="{{$emis->emi}}" class="form-control" required>
				</div>
				<div class="form-group mb-3">
					<label for="name">Effective Cost</label>
					<input type="number" placeholder="Effective Cost" name="effective_cost" id="effective_cost" value="{{$emis->effective_cost}}" class="form-control" required>
				</div>
                <div class="form-group mb-3">
					<label for="name">Percentage</label>
					<input type="text" placeholder="Percentage" name="percentage" id="percentage" value="{{$emis->percentage}}" class="form-control" required>
				</div>
                <div class="form-group mb-0 text-right">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
