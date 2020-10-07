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
              <h6 class="card-title">Special title treatment</h6>

              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
    </div>
@endsection

@push('js')
    
@endpush