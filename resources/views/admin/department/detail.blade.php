@extends('admin.layouts.master')

@section('title','Departments Details')
    
@push('css')

@endpush

@section('content')
    <div class="col-md-12">
        <div class="flex-row-fluid ml-lg-8">
            <!--begin::Card-->
            <div class="card card-custom card-stretch">
                <!--begin::Header-->
                <div class="card-header py-3">
                    <div class="card-title align-items-start flex-column">
                        <h3 class="card-label font-weight-bolder text-dark">Department Information</h3>
                        <span class="text-muted font-weight-bold font-size-sm mt-1"></span>
                    </div>
                    <div class="top-right mt-4">
                        <a href="{{ route('admin.department.index') }}"><button type="submit" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</button></a>
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Form-->
                <form class="form" method="POST" action=>
                    <!--begin::Body-->
                    <div class="card-body">
                        <div class="row">
                            <label class="col-xl-3 col-lg-3 col-form-label text-center">Department</label>
                            <div class="col-lg-9 col-xl-6">
                            <input class="form-control form-control-lg form-control-solid" type="text" value="{{$departments->deptName}}" disabled />
                            </div>
                        </div>
                </form>
                <!--end::Form-->
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>

    </script>
@endpush