@extends('admin.layouts.master')

@section('title','Add department')

@section('breadcrumb')
    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.department.index')}}" class="text-muted">Departments</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('admin.department.create')}}" class="text-muted">Add Department</a>
        </li>
    </ul>
@endsection

@push('css')

@endpush

@section('content')
    <div class="col-md-12">
        <div class="card card-custom example example-compact">
            <div class="card-header">
                <h3 class="card-title">Add New Department</h3>
                <div class="top-right mt-4">
                <a href="{{ route('admin.department.index') }}"><button type="submit" class="btn btn-primary">Save</button></a>
                   
                </div>
            </div>
            <!--begin::Form-->
            <form class="form" method="POST" action="{{ route('admin.department.store') }}">
                <div class="form-group row mt-3 justify-content-center">
                    <label class="col-form-label text-right col-lg-2">Departments <span class="text-danger">*</span></label>
                    <div class="col-lg-3">
                        <select class="form-control" id="kt_select2_1" name="department_id">
                            <option value="">Select</option>
                        </select>
                        <span class="form-text text-muted">Please select an department.</span>
                    </div> 
            </form>
            <!--end::Form-->
        </div>
    </div>
@endsection

@push('js')
    <script>

    </script>
@endpush
