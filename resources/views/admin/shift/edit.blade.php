@extends('admin.layouts.master')

@section('title','Shifts')

@section('breadcrumb')
    {{-- <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.employee.index')}}" class="text-muted">Employees</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('admin.employee.edit',$employee->id)}}" class="text-muted">Edit Employee</a>
        </li>
    </ul> --}}
@endsection

@push('css')

@endpush

@section('content')
<div class="col-md-12">
    <div class="col-md-12">
        <div class="card card-custom example example-compact">
            <div class="card-header">
                <h3 class="card-title">Edit Employee Shift</h3>
                <div class="top-right mt-4">
                    
                    <a href="{{ route('admin.employee.index') }}"><button type="submit" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</button></a>
                    <a href="{{ route('admin.employee.store') }}"><button type="submit" class="btn btn-success"><i class="fas fa-save"></i>Save</button></a>
                </div>

            </div>
            <!--begin::Form-->
            
            <!--end::Form-->
        </div>
    </div>
</div>
@endsection

@push('js')
    <script>

    </script>
@endpush
