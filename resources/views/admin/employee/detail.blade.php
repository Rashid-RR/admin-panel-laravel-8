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
                                            <div class="wizard-title">Bank</div>
                                            <div class="wizard-desc">Add Bank Options</div>
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
                                        <form class="form mt-0 mt-lg-10" id="kt_form" method="POST" action="{{ route('admin.employee.store') }}" enctype="multipart/form-data">
                                            @csrf
                                            
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
                                                    <input type="text" class="form-control" name="firstName" placeholder="First name" value="{{ $empById->firstName }}" required/>
                                                    <span class="form-text text-muted">Please enter your first name.</span>
                                                </div>
                                                <!--end::Input-->
                                                <!--begin::Input-->
                                                <div class="form-group">
                                                    <label>Last Name</label>
                                                    <input type="text" class="form-control" name="lastName" placeholder="Last name" value="{{ $empById->lastName }}" required/>
                                                    <span class="form-text text-muted">Please enter your last name.</span>
                                                </div>
                                                <!--end::Input-->
                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <!--begin::Input-->
                                                        <div class="form-group">
                                                            <label for="kt_select2_1">Gender</label>
                                                            <select class="form-control" id="kt_select2_1" name="gender" value="{{ $empById->gender }}" required>
                                                              <option class="active" selected disabled>Select Gender</option>                                 
                                                              <option value="M">Male</option>
                                                              <option value="F">Female</option>
                                                              <option value="NotSpecified">Other</option>
                                                            </select>
                                                            <span class="form-text text-muted">Please select gender</span>
                                                          </div>
                                                        
                                                        <!--end::Input-->
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <!--begin::Input-->
                                                        <div class="form-group">
                                                            <label>DOB<span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" name="dob" placeholder="Birth Date" id='kt_datepicker' value="{{$empById->dob}}"  required/>
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
                                                            <input type="text" class="form-control" name="cnic" placeholder="Enter your CNIC no." value="{{$empById->cnic}}" required/>   
                                                            <span class="form-text text-muted">Please enter your CNIC number.</span>
                                        
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <!--begin::Input-->
                                                        <div class="form-group">
                                                            <label>Email:</label>
                                                            <input type="email" class="form-control" name="email" placeholder="Enter your email" value="{{$empById->email}}" required />                                                                
                                                            
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
                                                            <input type="tel" class="form-control" name="homePhone" placeholder="Home number" value="{{$empById->homePhone}}" required />                                                                
                                                            
                                                            <span class="form-text text-muted">Please enter home no.</span>
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <!--begin::Input-->
                                                        <div class="form-group">
                                                            <label>Emergency Contact:</label>
                                                            <input type="text" class="form-control" name="emergencyContact" placeholder="Emergency contact" value="{{$empById->emergencyContact}}" required/>                                                                
                                                            
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
                                                            <input type="tel" class="form-control" name="workPhone" placeholder="Home number" value="{{$empById->workPhone}}" required />                                                                
                                                            
                                                            <span class="form-text text-muted">Please enter Work Phone.</span>
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <!--begin::Input-->
                                                        <div class="form-group">
                                                            <label>Emergency Phone:</label>
                                                            <input type="text" class="form-control" disabled name="emergencyPhone" placeholder="Emergency contact" value="{{$empById->emergencyPhone}}" required/>                                                                
                                                            
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
                                                            <input type="text" class="form-control" disabled name="postalCode" placeholder="Postcode" value="{{$empById->postalCode}}" />
                                                            <span class="form-text text-muted">Please enter your Postcode.</span>
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <!--begin::Input-->
                                                        <div class="form-group">
                                                            <label>City</label>
                                                            <input type="text" class="form-control" disabled name="city" placeholder="City" value="{{$empById->city }}" />
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
                                                            <input type="text" name="country" disabled value="{{$empById->country}}" >
                                                            <span class="form-text text-muted">Please select your Country.</span>
                                                        </div>
                                                        <!--end::Select-->
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Employee Address</label>
                                                    <input type="text" class="form-control" disabled name="employeeAddress" placeholder="Address Line 1" value="{{$empById->employeeCode}}" />
                                                    <span class="form-text text-muted">Please enter your permanent home address.</span>
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
                                                            <input type="text" class="form-control" disabled name="employeeCode" placeholder="Enter Employee Code" required/>
                                                            <span class="form-text text-muted">Please employee code.</span>
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <!--begin::Input-->
                                                        <div class="form-group">
                                                            <label>Hire Date<span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" name="hireDate" placeholder="Hire Date" id='kt_datepicker2' value="{{ $empById->hireDate }}" required/>                                                                

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
                                                            <input type="text" class="form-control" name="joinDate" placeholder="Join Date" id='kt_datepicker3' value="{{ $empById->joinDate }}" required/>                                                                
                                                            
                                                            <span class="form-text text-muted">Select your joining date.</span>
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <!--begin::Input-->
                                                        <div class="form-group">
                                                            <label>Salary:</label>
                                                            <input type="number" class="form-control" name="salary" placeholder="Enter employee salary" value="{{ $empById->salary }}" required/>                                                                
                                                            
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
                                                            <input disabled type="text" class="form-control form-control-lg form-control-solid"  value="{{ $empById->department->deptName }}" placeholder="Department" />
                                                            <span class="form-text text-muted">Please select an department.</span>
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <!--begin::Input-->
                                                        <div class="form-group">
                                                            <label>Designations<span class="text-danger">*</span></label>
                                                            <input disabled type="text" class="form-control form-control-lg form-control-solid"  value="{{ $empById->designation->name }}" placeholder="Designation" />
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
                                                            <input disabled type="text" class="form-control form-control-lg form-control-solid"  value="{{ $empById->location->location }}" placeholder="Location" />
                                                            <span class="form-text text-muted">Please select an location.</span>
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <!--begin::Input-->
                                                        <div class="form-group">
                                                            <label>Shift *</label>
                                                            <input disabled type="text" class="form-control form-control-lg form-control-solid"  value="{{ $empById->shift->name }}" placeholder="Shift" />
                                                            <span class="form-text text-muted">Please select an designation.</span>
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                </div>
                                            </div>
                                                <!--end: Wizard Step 2-->
                                            <!--begin: Wizard Step 3-->
                                            {{-- <div class="pb-5" data-wizard-type="step-content">
                                                <div class="mb-10 font-weight-bold text-dark">Enter your Payment Details</div>
                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <!--begin::Input-->
                                                        <div class="form-group">
                                                            <label>Account Title</label>
                                                            <input type="text" class="form-control form-control-solid form-control-lg" name="accountTitle" placeholder="Card Name" value="Nabeel" />
                                                            <span class="form-text text-muted">Please enter your Card Name.</span>
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <!--begin::Input-->
                                                        <div class="form-group">
                                                            <label>Account Number</label>
                                                            <input type="text" class="form-control form-control-solid form-control-lg" name="accountNumber" placeholder="Card Number" />
                                                            <span class="form-text text-muted">Please enter your Address.</span>
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                </div>
                                                {{-- <div class="row">
                                                    <div class="col-xl-4">
                                                        <!--begin::Input-->
                                                        <div class="form-group">
                                                            <label>Card Expiry Month</label>
                                                            <input type="number" class="form-control form-control-solid form-control-lg" name="ccmonth" placeholder="Card Expiry Month" />
                                                            <span class="form-text text-muted">Please enter your Card Expiry Month.</span>
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                    <div class="col-xl-4">
                                                        <!--begin::Input-->
                                                        <div class="form-group">
                                                            <label>Card Expiry Year</label>
                                                            <input type="number" class="form-control form-control-solid form-control-lg" name="ccyear" placeholder="Card Expire Year"/>
                                                            <span class="form-text text-muted">Please enter your Card Expiry Year.</span>
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                    <div class="col-xl-4">
                                                        <!--begin::Input-->
                                                        <div class="form-group">
                                                            <label>Card CVV Number</label>
                                                            <input type="password" class="form-control form-control-solid form-control-lg" name="cccvv" placeholder="Card CVV Number" />
                                                            <span class="form-text text-muted">Please enter your Card CVV Number.</span>
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                </div> 
                                            </div> 
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
                                                    <button type="submit" class="btn btn-success font-weight-bolder text-uppercase px-9 py-4" class="nextBtn" data-wizard-type="action-submit">Submit</button>
                                                    <button type="button" class="btn btn-primary font-weight-bolder text-uppercase px-9 py-4"  id="nextBtn" data-wizard-type="action-next">Next</button>
                                                </div>
                                            </div>
                                            <!--end: Wizard Actions-->
                                        </form>
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