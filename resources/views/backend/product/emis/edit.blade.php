@extends('backend.layouts.app')

@section('content')

<div class="aiz-titlebar text-left mt-2 mb-3">
    <h5 class="mb-0 h6">Bank Name</h5>
</div>

<div class="col-lg-8 mx-auto">
    <div class="card">
        <div class="card-body p-0">
            
            <form class="p-4" action="{{ route('emis.bankupdate', $emis->id) }}" method="POST" enctype="multipart/form-data">
                
                @csrf
                <div class="form-group row">
                    <label class="col-sm-3 col-from-label" for="name">Bank Name<i class="las la-language text-danger" title="Bank Name"></i></label>
                    <div class="col-sm-9">
                        <input type="text" placeholder="Bank Name" id="bank_name" name="bank_name" value="{{ $emis->bank_name }}" class="form-control" required>
                    </div>
                </div>
                
                <div class="form-group mb-0 text-right">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
