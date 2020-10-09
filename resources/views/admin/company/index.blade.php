@extends('admin.layouts.master')

@section('title','Company Master')
    
@push('css')

@endpush

@section('content')
    <div class="col-md-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
              <h5 class="m-0">
                  @if (count($companies) > 0)
                    Edit Existing Company
                  @else
                    Add New Company
                  @endif
              </h5>
            </div>
            <div class="card-body">
              <form action="" method="post" class="row">
                <div class="col-6">
                  <label for="company_name">Company Name</label>
                  <input type="text" name="company_name" id="company_name" class="form-control">
                  @error('company_name')
                      <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
                <div class="col-6">
                  <label for="company_logo">Company Logo</label>
                  <input type="file" name="company_logo" id="company_logo" class="form-control">
                  @error('company_logo')
                      <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
                <div class="col-12">
                  <label for="address">Company Address</label>
                  <textarea name="address" id="address" rows="4"></textarea>
                  @error('address')
                      <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
                <div class="col-4">
                  <label for="company_city">Company City</label>
                  <input type="text" name="company_city" id="company_city" class="form-control">
                  @error('company_city')
                      <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
                <div class="col-4">
                  <label for="company_state">Company State</label>
                  <input type="text" name="company_state" id="company_state" class="form-control">
                  @error('company_state')
                      <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
                <div class="col-4">
                  <label for="company_pin">Company Pincode</label>
                  <input type="text" name="company_pin" id="company_pin" class="form-control">
                  @error('company_pin')
                      <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </form>
            </div>
          </div>
    </div>
@endsection

@push('js')
    
@endpush