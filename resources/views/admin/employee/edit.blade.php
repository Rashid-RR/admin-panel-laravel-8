@extends('admin.layouts.master')

@section('title','Edit Employee')

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
                <h3 class="card-title">Edit Employee Information</h3>
                <div class="top-right mt-4">
                    <a href="{{ route('admin.employee.index') }}"><button type="submit" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</button></a>
                    <button type="submit" form="updateEmpForm" class="btn btn-success"><i class="fas fa-save"></i>Update</button>
                </div>
            </div>
            <!--begin::Form-->
            <form class="form" method="POST" id="updateEmpForm" action="{{ route('admin.employee.update',$employee->id) }}" enctype="multipart/form-data">
                @csrf
                {{ @method_field('PUT') }}
                <div class="card-body">
                    
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label text-right">Profile Picture:</label>
                        <div class="col-lg-9 col-xl-6">
                            <div class="image-input image-input-outline" id="kt_image_2">
                                <div class="image-input-wrapper" style="background-image: url({{ asset('employeesProfile/'.$employee->profile) }})"></div>
                                <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                    <i class="fa fa-pen icon-sm"></i>
                                    <input type="file" name="profile" accept=".png, .jpg, .jpeg" />
                                    {{-- <input type="hidden" name="profile_avatar_remove" /> --}}
                                </label>
                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                </span>
                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove avatar">
                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                </span>
                            </div>
                            <span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <label class="col-lg-2 col-form-label text-right">First Name:</label>
                        <div class="col-lg-3">
                            <input type="text" class="form-control " name="firstName" placeholder="First name" value="{{$employee->firstName}}" readonly/>
                            <span class="form-text text-muted">Please enter your first name</span>
                        </div>
                        <label class="col-lg-2 col-form-label text-right">Last Name:</label>
                        <div class="col-lg-3">
                            <input type="text" class="form-control" name="lastName" placeholder="Last name" value="{{$employee->lastName}}" required readonly/>
                            <span class="form-text text-muted">Please enter your last name</span>
                        </div>
                        <div class="col-lg-2"></div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label text-right" disabled>Gender:</label>
                        <div class="col-lg-3">
                            <div class="radio-inline">
                                <label class="radio radio-solid">
                                <input type="radio" name="gender" value="M" required readonly @if($employee->gender == 'M'){{ 'checked' }}@endif/>
                                    <span></span>Male</label>
                                <label class="radio radio-solid">
                                    <input type="radio" name="gender" value="F" readonly @if($employee->gender == 'F'){{ 'checked' }}@endif/>
                                    <span></span>Female</label>
                            </div>
                            <span class="form-text text-muted">Please select gender</span>
                        </div>
                        <label class="col-form-label col-lg-2 text-right">DOB<span class="text-danger">*</span></label>
                        <div class="col-lg-3 col-md-9 col-sm-12">
                            <div class="input-group">
                                <input type="text" class="form-control" name="dob" placeholder="Birth Date" id='kt_datepicker' value="{{ $employee->dob }}" required readonly/>
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="la la-calendar-check-o"></i>
                                    </span>
                                </div>
                            </div>
                            <span class="form-text text-muted">Select you date of birth</span>
                        </div>
                        <div class="col-lg-2"></div>
                    </div>


                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-2">CNIC<span class="text-danger">*</span></label>
                        <div class="col-lg-3">
                            <div class="input-group">
                                <input type="text" class="form-control" name="cnic" value="{{ $employee->cnic }}" placeholder="Enter your CNIC no." required readonly/>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="flaticon2-browser"></i>
                                    </span>
                                </div>
                            </div>
                            <span class="form-text text-muted">Please enter correct CNIC</span>
                        </div>
                        <label class="col-form-label text-right col-lg-2">Address *</label>
                        <div class="col-lg-3">
                            <textarea class="form-control" name="employeeAddress" placeholder="Enter your address" rows="3" readonly>{{ $employee->employeeAddress }}</textarea>
                            <span class="form-text text-muted">Please enter your permanent home address.</span>
                        </div>
                        <div class="col-lg-2"></div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label text-right">Email:</label>
                        <div class="col-lg-3">
                            <div class="input-group">
                                <input type="email" class="form-control" name="email" placeholder="Enter your email" value="{{ $employee->email }}" readonly/>
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="las la-envelope"></i>
                                    </span>
                                </div>
                            </div>
                            <span class="form-text text-muted">Please enter your email</span>
                        </div>
                        <label class="col-lg-2 col-form-label text-right">Home Phone:</label>
                        <div class="col-lg-3">
                            <div class="input-group">
                                <input type="text" class="form-control" name="homePhone" placeholder="Home number" value={{$employee->homePhone}} readonly />
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="la la-phone"></i>
                                    </span>
                                </div>
                            </div>
                            <span class="form-text text-muted">Please enter home no.</span>
                        </div>
                        <div class="col-lg-2"></div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label text-right">Work Phone:</label>
                        <div class="col-lg-3">
                            <div class="input-group">
                                <input type="text" class="form-control" name="workPhone" placeholder="Work number" readonly value={{$employee->workPhone}} />
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="las la-phone-volume"></i>
                                    </span>
                                </div>
                            </div>
                            <span class="form-text text-muted">Please enter work no.</span>
                        </div>
                        <label class="col-lg-2 col-form-label text-right">Emergency Contact:</label>
                        <div class="col-lg-3">
                            <div class="input-group">
                                <input type="text" class="form-control" name="emergencyContact" placeholder="Emergency contact" readonly value={{$employee->emergencyContact}}/>
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="las la-mobile"></i>
                                    </span>
                                </div>
                            </div>
                            <span class="form-text text-muted">Please enter emergency contact no.</span>
                        </div>
                        <div class="col-lg-2"></div>
                        
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label text-right">Emergency Phone:</label>
                        <div class="col-lg-3">
                            <div class="input-group">
                                <input type="text" class="form-control" name="emergencyPhone" placeholder="Emergency Phone" readonly value={{$employee->emergencyPhone}} required />
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="las la-phone"></i>
                                    </span>
                                </div>
                            </div>
                            <span class="form-text text-muted">Please enter emergency phone no.</span>
                        </div>
                        <label class="col-lg-2 col-form-label text-right">Country:</label>
                        <div class="col-lg-3">
                            <div class="input-group">
                                <input type="text" class="form-control" name="country" placeholder="Enter your country" readonly value={{$employee->country}} required/>
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="las la-city"></i>
                                    </span>
                                </div>
                            </div>
                            <span class="form-text text-muted">Please enter your country</span>
                        </div>
                        <div class="col-lg-2"></div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label text-right">City:</label>
                        <div class="col-lg-3">
                            <div class="input-group">
                                <input type="text" class="form-control" name="city" placeholder="Enter your city" readonly value={{$employee->city}} required/>
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="la la-map-marker"></i>
                                    </span>
                                </div>
                            </div>
                            <span class="form-text text-muted">Please enter your city</span>
                        </div>
                        <label class="col-lg-2 col-form-label text-right">Postcode:</label>
                        <div class="col-lg-3">
                            <div class="input-group">
                                <input type="text" class="form-control" name="postalCode" placeholder="Enter your postcode" readonly value={{$employee->postalCode}} required/>
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="la la-bookmark-o"></i>
                                    </span>
                                </div>
                            </div>
                            <span class="form-text text-muted">Please enter your postcode</span>
                        </div>
                        <div class="col-lg-2"></div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label text-right">Employee Code:</label>
                        <div class="col-lg-3">
                            <input type="text" class="form-control" name="employeeCode" placeholder="Enter Employee Code" value={{$employee->employeeCode}} required/>
                            <span class="form-text text-muted">Please employee code.</span>
                        </div>
                        <label class="col-form-label col-lg-2 text-right">Hire Date<span class="text-danger">*</span></label>
                        <div class="col-lg-3">
                            <div class="input-group">
                                <input type="text" class="form-control" name="hireDate" placeholder="Hire Date" id='kt_datepicker2' value="{{ $employee->hireDate }}" required/>
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="la la-calendar-check-o"></i>
                                    </span>
                                </div>
                            </div>
                            <span class="form-text text-muted">Select your hiring date</span>
                        </div>
                        <div class="col-lg-2"></div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2 text-right">Joining Date<span class="text-danger">*</span></label>
                        <div class="col-lg-3">
                            <div class="input-group">
                                <input type="text" class="form-control" name="joinDate" placeholder="Join Date" id='kt_datepicker3' value="{{ $employee->joinDate }}" required/>
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="la la-calendar-check-o"></i>
                                    </span>
                                </div>
                            </div>
                            <span class="form-text text-muted">Select your joining date</span>
                        </div>
                        <label class="col-lg-2 col-form-label text-right">Salary:</label>
                        <div class="col-lg-3">
                            <div class="input-group">
                                <input type="number" class="form-control" name="salary" placeholder="Enter employee salary" value="{{ $employee->salary }}" required/>
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="las la-coins"></i>
                                    </span>
                                </div>
                            </div>
                            <span class="form-text text-muted">Please enter your salary</span>
                        </div>
                        <div class="col-lg-2"></div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-2">Departments <span class="text-danger">*</span></label>
                        <div class="col-lg-3">
                            <select class="form-control" id="kt_select2_1" name="department_id">
                                <option value="">Select</option>
                                @foreach($departments as $item)
                                    <option value="{{ $item->id }}" @if($employee->department_id == $item->id) {{'selected'}} @endif>{{ $item->deptName }}</option>
                                @endforeach
                            </select>
                            <span class="form-text text-muted">Please select an department.</span>
                        </div>
                        <label class="col-form-label text-right col-lg-2">Designations <span class="text-danger">*</span></label>
                        <div class="col-lg-3">
                            <select class="form-control" id="kt_select2_11" name="designation_id">
                                <option value="">Select</option>
                                @foreach($designations as $item)
                                    <option value="{{ $item->id }}" @if($employee->designation_id == $item->id) {{'selected'}} @endif>{{ $item->name }}</option>
                                @endforeach
                            </select>
                            <span class="form-text text-muted">Please select an designation.</span>
                        </div>
                        <div class="col-lg-2"></div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-2">Location *</label>
                        <div class="col-lg-3">
                            <select class="form-control" id="kt_select2_111" name="location_id">
                                <option value="">Select</option>
                                @foreach($locations as $item)
                                    <option value="{{ $item->id }}" @if($employee->location_id == $item->id) {{'selected'}} @endif>{{ $item->location }}</option>
                                @endforeach
                            </select>
                            <span class="form-text text-muted">Please select an location.</span>
                        </div>
                        <label class="col-form-label text-right col-lg-2">Shift *</label>
                        <div class="col-lg-3">
                            <select class="form-control" id="kt_select2_1111" name="shift_id">
                                <option value="">Select</option>
                                @foreach($shifts as $item)
                                    <option value="{{ $item->id }}" @if($employee->shift_id == $item->id) {{'selected'}} @endif>{{ $item->name }}</option>
                                @endforeach
                            </select>
                            <span class="form-text text-muted">Please select an designation.</span>
                        </div>
                        <div class="col-lg-2"></div>
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
