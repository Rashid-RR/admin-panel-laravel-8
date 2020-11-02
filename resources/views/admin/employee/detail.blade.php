@extends('admin.layouts.master')

@section('title','Employees Details')
    
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
                        <h3 class="card-label font-weight-bolder text-dark">Personal Information</h3>
                        <span class="text-muted font-weight-bold font-size-sm mt-1">Update your personal informaiton</span>
                    </div>
                    <div class="top-right mt-4">
                        <a href="{{ route('admin.employee.index') }}"><button type="submit" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</button></a>
                    </div>
                </div>
                <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body">
                        <div class="row">
                            <label class="col-xl-3"></label>
                            <div class="col-lg-9 col-xl-6">
                                <h5 class="font-weight-bold mb-6">Employee Info</h5>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label text-center">Profile</label>
                            <div class="col-lg-9 col-xl-6">
                                <div class="image-input image-input-outline" id="kt_profile_avatar">
                                    <div class="image-input-wrapper" style="background-image: url({{ asset('employeesProfile/'.$empById->profile) }})"></div>
                                    
                                </div>
                                <span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label text-center">First Name</label>
                            <div class="col-lg-9 col-xl-6">
                                <input disabled class="form-control form-control-lg form-control-solid" type="text" value="{{ $empById->firstName }}" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label text-center">Last Name</label>
                            <div class="col-lg-9 col-xl-6">
                                <input disabled class="form-control form-control-lg form-control-solid" type="text"  value="{{ $empById->lastName }}" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label text-center">Gender</label>
                            <div class="col-lg-9 col-xl-6">
                                <input disabled class="form-control form-control-lg form-control-solid" type="text" value="{{ $empById->gender }}" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label text-center">DOB</label>
                            <div class="col-lg-9 col-xl-6">
                                <input disabled class="form-control form-control-lg form-control-solid" type="text" value="{{$empById->dob}}" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label text-center">CNIC</label>
                            <div class="col-lg-9 col-xl-6">
                                <input disabled class="form-control form-control-lg form-control-solid" type="text" value="{{$empById->cnic}}" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label text-center">ADDRESS</label>
                            <div class="col-lg-9 col-xl-6">
                                <input disabled class="form-control form-control-lg form-control-solid" type="text" value="{{$empById->employeeAddress}}" />
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-xl-3"></label>
                            <div class="col-lg-9 col-xl-6">
                                <h5 class="font-weight-bold mt-10 mb-6 text-center">Contact Info</h5>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label text-center">Email:</label>
                            <div class="col-lg-9 col-xl-6">
                                <div class="input-group input-group-lg input-group-solid">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="la la-at"></i>
                                        </span>
                                    </div>
                                    <input disabled type="text" class="form-control form-control-lg form-control-solid" value="{{$empById->email}}" placeholder="Email" />
                                </div>
                                <span class="form-text text-muted">We'll never share your email with anyone else.</span>
                                
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label text-center">Home Phone:</label>
                            <div class="col-lg-9 col-xl-6">
                                <div class="input-group input-group-lg input-group-solid">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="la la-phone"></i>
                                        </span>
                                    </div>
                                    <input disabled type="text" class="form-control form-control-lg form-control-solid" value="{{$empById->homePhone}}" placeholder="Phone" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label text-center">Work Phone:</label>
                            <div class="col-lg-9 col-xl-6">
                                <div class="input-group input-group-lg input-group-solid">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="la la-phone"></i>
                                        </span>
                                    </div>
                                    <input disabled type="text" class="form-control form-control-lg form-control-solid" value="{{$empById->workPhone}}" placeholder="Phone" />
                                </div>
                                {{-- <span class="form-text text-muted">We'll never share your email with anyone else.</span> --}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label text-center">Emergency Contact:</label>
                            <div class="col-lg-9 col-xl-6">
                                <div class="input-group input-group-lg input-group-solid">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="las la-mobile"></i>
                                        </span>
                                    </div>
                                    <input disabled type="text" class="form-control form-control-lg form-control-solid" value="{{$empById->emergencyContact}}" placeholder="Phone" />
                                </div>
                                {{-- <span class="form-text text-muted">We'll never share your email with anyone else.</span> --}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label text-center">Emergency Phone:</label>
                            <div class="col-lg-9 col-xl-6">
                                <div class="input-group input-group-lg input-group-solid">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="la la-phone"></i>
                                        </span>
                                    </div>
                                    <input disabled type="text" class="form-control form-control-lg form-control-solid" value="{{$empById->emergencyPhone}}" placeholder="Phone" />
                                </div>
                                {{-- <span class="form-text text-muted">We'll never share your email with anyone else.</span> --}}
                            </div>
                        </div>
                        <div class="form-group row">

                            <label class="col-xl-3 col-lg-3 col-form-label text-center">Country:</label>
                            <div class="col-lg-9 col-xl-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="la la-city"></i>
                                        </span>
                                    </div>
                                    <input disabled type="text" class="form-control form-control-lg form-control-solid" value="{{$empById->country}}" placeholder="Enter your country" required/>
                                </div>
                                
                            </div>
                        </div>
                        <div class="form-group row">

                            <label class="col-xl-3 col-lg-3 col-form-label text-center">city:</label>
                            <div class="col-lg-9 col-xl-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="la la-map-marker"></i>
                                        </span>
                                    </div>
                                    <input disabled type="text" class="form-control form-control-lg form-control-solid" name="city" value="{{$empById->city }}" placeholder="Enter your city" required/>
                                </div>
                                
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label text-center">Postcode:</label>
                            <div class="col-lg-9 col-xl-6">
                                <div class="input-group input-group-lg input-group-solid">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="la la-bookmark-o"></i>
                                        </span>
                                    </div>
                                    <input disabled type="text" class="form-control" name="postalCode" value="{{$empById->postalCode}}" placeholder="Enter your postcode" required />
                                    
                                </div>
                                {{-- <span class="form-text text-muted">We'll never share your email with anyone else.</span> --}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label text-center">Employee Code:</label>
                            <div class="col-lg-9 col-xl-6">
                                <div class="input-group input-group-lg input-group-solid">
                                    <input disabled type="text" class="form-control" name="employeeCode" placeholder="Enter Employee Code" value="{{$empById->employeeCode}}" required/>
                                </div>
                            </div>
                        </div><div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label text-center">Hire Date</label>
                            <div class="col-lg-9 col-xl-6">
                                <div class="input-group input-group-lg input-group-solid">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="la la-calendar-check-o"></i>
                                        </span>
                                    </div>
                                    <input disabled type="text" class="form-control" name="hireDate" placeholder="Hire Date" id='kt_datepicker2' value="{{ $empById->hireDate }}" required/>
                                </div>
                            </div>
                        </div><div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label text-center">Joining Date</label>
                            <div class="col-lg-9 col-xl-6">
                                <div class="input-group input-group-lg input-group-solid">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="la la-calendar-check-o"></i>
                                        </span>
                                    </div>
                                    <input disabled type="text" class="form-control" name="joinDate" placeholder="Join Date" value="{{ $empById->joinDate }}" id='kt_datepicker3' required/>
                                </div>
                            </div>
                        </div><div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label text-center">Salary:</label>
                            <div class="col-lg-9 col-xl-6">
                                <div class="input-group input-group-lg input-group-solid">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="las la-coins"></i>
                                        </span>
                                    </div>
                                    <input disabled type="number" class="form-control" name="salary" placeholder="Enter employee salary" value="{{ $empById->salary }}" required/>
                                </div>
                            </div>
                        </div><div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label text-center">Department</label>
                            <div class="col-lg-9 col-xl-6">
                                <div class="input-group input-group-lg input-group-solid">
                                    <input disabled type="text" class="form-control form-control-lg form-control-solid"  value="{{ $empById->department->deptName }}" placeholder="Department" />
                                </div>
                            </div>
                        </div><div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label text-center">Designation</label>
                            <div class="col-lg-9 col-xl-6">
                                <div class="input-group input-group-lg input-group-solid">
                                    <input disabled type="text" class="form-control form-control-lg form-control-solid"  value="{{ $empById->designation->name }}" placeholder="Designation" />
                                </div>
                            </div>
                        </div><div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label text-center">Location</label>
                            <div class="col-lg-9 col-xl-6">
                                <div class="input-group input-group-lg input-group-solid">
                                    <input disabled type="text" class="form-control form-control-lg form-control-solid"  value="{{ $empById->location->location }}" placeholder="Location" />
                                </div>
                            </div>
                        </div><div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label text-center">Shift</label>
                            <div class="col-lg-9 col-xl-6">
                                <div class="input-group input-group-lg input-group-solid">
                                    <input disabled type="text" class="form-control form-control-lg form-control-solid"  value="{{ $empById->shift->name }}" placeholder="Shift" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Body-->
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>

    </script>
@endpush