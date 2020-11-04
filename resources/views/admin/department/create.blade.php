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
                    <a href="{{ route('admin.department.index') }}"><button type="submit" class="btn btn-secondary"> <i class="fas fa-arrow-left"></i> Back</button></a>
                    <button form="saveDeptForm" type="submit" class="btn btn-success"><i class="fas fa-save"></i>Create</button>
                </div>
            </div>
            <!--begin::Form-->
            <form class="form" id="saveDeptForm" method="POST" action="{{ route('admin.department.store') }}">
                @csrf
                <div class="form-group row mt-3 justify-content-center">
                    <label class="col-form-label text-right col-lg-2">Departments <span class="text-danger">*</span></label>
                    <div class="col-lg-3">
                        <input type="text" class="form-control form-control-lg form-control-solid" name="deptName" placeholder="Department Name" />
                    </div>
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
