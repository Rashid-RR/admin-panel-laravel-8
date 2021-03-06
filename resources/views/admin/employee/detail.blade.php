@extends('admin.layouts.master')

@section('title','Employees Details')
    
@push('css')
<link href="{{ asset('css/pages/wizard/wizard-4.css')}}" rel="stylesheet" type="text/css" />


@endpush

@section('content')
<div class="col-md-12">
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <a href="{{ route('admin.employee.index')}}" class="btn btn-light-primary font-weight-bolder mb-2 mt-4">
                <i class="ki ki-long-arrow-back icon-sm"></i>Back
            </a>
            <div class="card card-custom card-transparent">
                <div class="card-body p-0">
                    <!--begin: Wizard-->
                    <div class="wizard wizard-4" id="kt_wizard" data-wizard-state="step-first" data-wizard-clickable="true">
                        <!--begin: Wizard Nav-->
                        <div class="wizard-nav">
                            <div class="wizard-steps">
                                <!--begin::Wizard Step 1 Nav-->
                                <div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
                                    <div class="wizard-wrapper">
                                        <div class="wizard-number">1</div>
                                        <div class="wizard-label">
                                            <div class="wizard-title">Add Account</div>
                                            <div class="wizard-desc">Create Custom Account</div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Wizard Step 1 Nav-->
                                <!--begin::Wizard Step 2 Nav-->
                                <div class="wizard-step" data-wizard-type="step">
                                    <div class="wizard-wrapper">
                                        <div class="wizard-number">2</div>
                                        <div class="wizard-label">
                                            <div class="wizard-title">Employment</div>
                                            <div class="wizard-desc">Setup Your Data</div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Wizard Step 2 Nav-->
                                <!--begin::Wizard Step 3 Nav-->
                                <div class="wizard-step" data-wizard-type="step">
                                    <div class="wizard-wrapper">
                                        <div class="wizard-number">3</div>
                                        <div class="wizard-label">
                                            <div class="wizard-title">Add Document</div>
                                            <div class="wizard-desc">Add Document Options</div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Wizard Step 3 Nav-->
                                <!--begin::Wizard Step 4 Nav-->
                                <div class="wizard-step" data-wizard-type="step">
                                    <div class="wizard-wrapper">
                                        <div class="wizard-number">4</div>
                                        <div class="wizard-label">
                                            <div class="wizard-title">Completed</div>
                                            <div class="wizard-desc">Review and Submit</div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Wizard Step 4 Nav-->
                            </div>
                        </div>
                        <!--end: Wizard Nav-->
                        <!--begin: Wizard Body-->
                        <div class="card card-custom card-shadowless rounded-top-0">
                            <div class="card-body p-0">
                                <div class="row justify-content-center py-8 px-8 py-lg-15 px-lg-10">
                                    <div class="col-xl-12 col-xxl-7">
                                        <!--begin: Wizard Form-->
                                        <div id="kt_form">
                                            
                                            
                                            <!--begin: Wizard Step 1-->
                                            <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">

                                                <div class="form-group row justify">
                                                    <label class="col-lg-3 col-form-label"><b>Profile Picture:</b></label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <div class="image-input image-input-outline" id="kt_image_2">
                                                            <div class="image-input-wrapper" style="background-image: url({{ asset('employeesProfile/'.$empById->profile) }})"></div>
                                                            {{-- <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                                                <i class="fa fa-pen icon-sm"></i>
                                                                <input type="file" name="profile" accept=".png, .jpg, .jpeg" />
                                                                <input type="hidden" name="profile_avatar_remove" />
                                                            </label> --}}
                                                            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                            </span>
                                                            {{-- <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove avatar" aria-disabled="t">
                                                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                            </span> --}}
                                                        </div>
                                                        <span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>
                                                    </div>
                                                </div>

                                                <div class="mb-10 font-weight-bold text-dark">Enter your Account Details</div>
                                                <!--begin::Input-->
                                                <div class="form-group">
                                                    <label>First Name</label>
                                                    <input type="text" class="form-control" name="" placeholder="First name" value="{{ $empById->firstName }}" required disabled/>
                                                    <span class="form-text text-muted">Please enter your first name.</span>
                                                </div>
                                                <!--end::Input-->
                                                <!--begin::Input-->
                                                <div class="form-group">
                                                    <label>Last Name</label>
                                                    <input type="text" class="form-control" name="" placeholder="Last name" value="{{ $empById->lastName }}" required disabled/>
                                                    <span class="form-text text-muted">Please enter your last name.</span>
                                                </div>
                                                <!--end::Input-->
                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <!--begin::Input-->
                                                        <div class="form-group">
                                                            <label for="kt_select2_1">Gender</label>
                                                            @if($empById->gender == 'M')
                                                                    <input type="text" class="form-control" value="Male" required disabled/>
                                                                @elseif($empById->gender == 'F')
                                                                    <input type="text" class="form-control" value="Female" required disabled/>
                                                                @else
                                                                    <input type="text" class="form-control" value="Not Specified" required disabled/>
                                                              @endif
                                                            <span class="form-text text-muted">Please select gender</span>
                                                          </div>
                                                        
                                                        <!--end::Input-->
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <!--begin::Input-->
                                                        <div class="form-group">
                                                            <label>DOB<span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" name="" placeholder="Birth Date" id='kt_datepicker' value="{{$empById->dob}}"  required disabled/>
                                                            <span class="form-text text-muted">Select you date of birth</span>
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <!--begin::Input-->
                                                        <div class="form-group">
                                                            <label>CNIC<span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" name="" placeholder="Enter your CNIC no." value="{{$empById->cnic}}" required disabled/>   
                                                            <span class="form-text text-muted">Please enter your CNIC number.</span>
                                        
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <!--begin::Input-->
                                                        <div class="form-group">
                                                            <label>Email:</label>
                                                            <input type="email" class="form-control" name="" placeholder="Enter your email" value="{{$empById->email}}" required disabled/>                                                                
                                                            
                                                            <span class="form-text text-muted">Please enter your email address.</span>
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <!--begin::Input-->
                                                        <div class="form-group">
                                                            <label>Home Phone:</label>
                                                            <input type="tel" class="form-control" name="" placeholder="Home number" value="{{$empById->homePhone}}" required disabled/>                                                                
                                                            
                                                            <span class="form-text text-muted">Please enter home no.</span>
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <!--begin::Input-->
                                                        <div class="form-group">
                                                            <label>Emergency Contact:</label>
                                                            <input type="text" class="form-control" name="" placeholder="Emergency contact" value="{{$empById->emergencyContact}}" required disabled/>                                                                
                                                            
                                                            <span class="form-text text-muted">Please enter emergency contact no.</span>
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <!--begin::Input-->
                                                        <div class="form-group">
                                                            <label>Work Phone:</label>
                                                            <input type="tel" class="form-control" name="" placeholder="Home number" value="{{$empById->workPhone}}" required disabled/>                                                                
                                                            
                                                            <span class="form-text text-muted">Please enter Work Phone.</span>
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <!--begin::Input-->
                                                        <div class="form-group">
                                                            <label>Emergency Phone:</label>
                                                            <input type="text" class="form-control"  name="" placeholder="Emergency contact" value="{{$empById->emergencyPhone}}" required disabled/>                                                                
                                                            
                                                            <span class="form-text text-muted">Please enter emergency Emergency Phone.</span>
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                </div>
                                               
                                                <!--end::Input-->
                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <!--begin::Input-->
                                                        <div class="form-group">
                                                            <label>Postcode</label>
                                                            <input type="text" class="form-control" disabled name="" placeholder="Postcode" value="{{$empById->postalCode}}" disabled />
                                                            <span class="form-text text-muted">Please enter your Postcode.</span>
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <!--begin::Input-->
                                                        <div class="form-group">
                                                            <label>City</label>
                                                            <input type="text" class="form-control" disabled name="city" placeholder="City" value="{{$empById->city }}" disabled/>
                                                            <span class="form-text text-muted">Please enter your City.</span>
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xl-12">
                                                        <!--begin::Select-->
                                                        <div class="form-group">
                                                            <label>Country</label>
                                                            <input type="text"  class="form-control" name="country" disabled value="{{$empById->country}}" disabled >
                                                            <span class="form-text text-muted">Please select your Country.</span>
                                                        </div>
                                                        <!--end::Select-->
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end: Wizard Step 1-->
                                            <!--begin: Wizard Step 2-->
                                            <div class="pb-5" data-wizard-type="step-content">
                                                <div class="mb-10 font-weight-bold text-dark">Setup Your Data</div>
                                                <!--begin::Input-->
                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <!--begin::Input-->
                                                        <div class="form-group">
                                                            <label>Employee Code:</label>
                                                            <input type="text" class="form-control" value="{{ $empById->employeeCode }}" disabled/>
                                                            <span class="form-text text-muted">Please employee code.</span>
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <!--begin::Input-->
                                                        <div class="form-group">
                                                            <label>Hire Date<span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" name="" placeholder="Hire Date" id='kt_datepicker2' value="{{ $empById->hireDate }}" required disabled/>                                                                

                                                            <span class="form-text text-muted">Select your hiring date.</span>
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <!--begin::Input-->
                                                        <div class="form-group">
                                                            <label>Joining Date</b><span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" name="" placeholder="Join Date" id='kt_datepicker3' value="{{ $empById->joinDate }}" required disabled/>                                                                
                                                            
                                                            <span class="form-text text-muted">Select your joining date.</span>
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <!--begin::Input-->
                                                        <div class="form-group">
                                                            <label>Salary:</label>
                                                            <input type="number" class="form-control" name="" placeholder="Enter employee salary" value="{{ $empById->salary }}" required disabled/>                                                                
                                                            
                                                            <span class="form-text text-muted">Please enter your salary.</span>
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <!--begin::Input-->
                                                        <div class="form-group">
                                                            <label>Departments<span class="text-danger">*</span></label>
                                                            <input disabled type="text" class="form-control form-control-lg form-control-solid"  value="{{ $empById->department->deptName }}" placeholder="Department" disabled/>
                                                            <span class="form-text text-muted">Please select an department.</span>
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <!--begin::Input-->
                                                        <div class="form-group">
                                                            <label>Designations<span class="text-danger">*</span></label>
                                                            <input disabled type="text" class="form-control form-control-lg form-control-solid"  value="{{ $empById->designation->name }}" placeholder="Designation" disabled/>
                                                            <span class="form-text text-muted">Please select an designation.</span>
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <!--begin::Input-->
                                                        <div class="form-group">
                                                            <label>Location *</label>
                                                            <input disabled type="text" class="form-control form-control-lg form-control-solid"  value="{{ $empById->location->location }}" placeholder="Location" disabled/>
                                                            <span class="form-text text-muted">Please select an location.</span>
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <!--begin::Input-->
                                                        <div class="form-group">
                                                            <label>Shift *</label>
                                                            <input disabled type="text" class="form-control form-control-lg form-control-solid"  value="{{ $empById->shift->name }}" placeholder="Shift" disabled/>
                                                            <span class="form-text text-muted">Please select an designation.</span>
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                </div>
                                            </div>
                                                <!--end: Wizard Step 2-->
                                            <!--begin: Wizard Step 3-->
                                            @if($documentById != null)
                                                <div class="pb-5" data-wizard-type="step-content">
                                                    <div class="mb-10 font-weight-bold text-dark">Enter your Document Details</div>
                                                    <div class="row">
                                                        <div class="col-xl-6">
                                                            <!--begin::Input-->
                                                            <div class="form-group">
                                                                <label>Document Name</label>
                                                                <input type="text" class="form-control" value="{{$documentById->name}}" disabled/>
                                                                <span class="form-text text-muted">Please enter your Document Name.</span>
                                                            </div>
                                                            <!--end::Input-->
                                                        </div>
                                                        <div class="col-xl-6">
                                                            <!--begin::Input-->
                                                            <div class="form-group">
                                                                <label>Expire Date<span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" value="{{$documentById->expiryDate}}" disabled/>
                                                                <span class="form-text text-muted"></span>
                                                            </div>
                                                            <!--end::Input-->
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Document Type<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" value="{{$documentTypeById->type}}" disabled/>
                                                        <span class="form-text text-muted">Please select an document type</span>
                                                    </div>
                                                    <div class="form-group row justify">
                                                        <label class="col-lg-5 col-form-label">
                                                            <b>
                                                                <a href="{{ asset('employeesDocument/'.$documentById->image) }}" download="Employee-Document">Download Document</a>
                                                            </b>
                                                        </label>
                                                        <div class="col-lg-7 col-xl-4">
                                                            <div class="image-input image-input-outline" id="kt_image_2">
                                                                <div class="image-input-wrapper" style="background-image: url({{ asset('employeesDocument/'.$documentById->image) }})"></div>
                                                                {{-- <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                                                    <i class="fa fa-pen icon-sm"></i>
                                                                    <input type="file" name="profile" accept=".png, .jpg, .jpeg" />
                                                                    <input type="hidden" name="profile_avatar_remove" />
                                                                </label> --}}
                                                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                                </span>
                                                                {{-- <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove avatar" aria-disabled="t">
                                                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                                </span> --}}
                                                            </div>
                                                            <span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="pb-5" data-wizard-type="step-content">
                                                    <div class="mb-10 font-weight-bold text-primary">Documents isn't uploaded yet !</div>
                                                </div>    
                                            @endif
                                            
                                            <!--end: Wizard Step 3-->
                                            <!--begin: Wizard Step 4-->
                                            {{-- <div class="pb-5" data-wizard-type="step-content">
                                                <!--begin::Section-->
                                                <h4 class="mb-10 font-weight-bold text-dark">Review your Details and Submit</h4>
                                                <h6 class="font-weight-bolder mb-3">Current Address:</h6>
                                                <div class="text-dark-50 line-height-lg">
                                                    <div>w</div>
                                                </div>
                                                <div class="separator separator-dashed my-5"></div>
                                                <!--end::Section-->
                                                <!--begin::Section-->
                                                <h6 class="font-weight-bolder mb-3">Delivery Details:</h6>
                                                <div class="text-dark-50 line-height-lg">
                                                    <div>Package: Complete Workstation (Monitor, Computer, Keyboard &amp; Mouse)</div>
                                                    <div>Weight: 25kg</div>
                                                    <div>Dimensions: 110cm (w) x 90cm (h) x 150cm (L)</div>
                                                </div>
                                                <div class="separator separator-dashed my-5"></div>
                                                <!--end::Section-->
                                                <!--begin::Section-->
                                                <h6 class="font-weight-bolder mb-3">Delivery Service Type:</h6>
                                                <div class="text-dark-50 line-height-lg">
                                                    <div>Overnight Delivery with Regular Packaging</div>
                                                    <div>Preferred Morning (8:00AM - 11:00AM) Delivery</div>
                                                </div>
                                                <div class="separator separator-dashed my-5"></div>
                                                <!--end::Section-->
                                                <!--begin::Section-->
                                                <h6 class="font-weight-bolder mb-3">Delivery Address:</h6>
                                                <div class="text-dark-50 line-height-lg">
                                                    <div>Address Line 1</div>
                                                    <div>Address Line 2</div>
                                                    <div>Preston 3072, VIC, Australia</div>
                                                </div>
                                                <!--end::Section-->
                                            </div> --}}
                                            <!--end: Wizard Step 4-->
                                            <!--begin: Wizard Actions-->
                                            <div class="d-flex justify-content-between border-top mt-5 pt-10">
                                                <div class="mr-2">
                                                    <button type="button" class="btn btn-light-primary font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-prev">Previous</button>
                                                </div>
                                                <div>
                                                    <button type="button" class="btn btn-primary font-weight-bolder text-uppercase px-9 py-4"  id="nextBtn" data-wizard-type="action-next">Next</button>
                                                </div>
                                            </div>
                                            <!--end: Wizard Actions-->
                                        </div>
                                        <!--end: Wizard Form-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end: Wizard Bpdy-->
                    </div>
                    <!--end: Wizard-->
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
    
</div>
@endsection

@push('js')

<script src="{{ asset('js/pages/custom/wizard/wizard-4.js')}}"></script>

    <script>

    </script>
@endpush