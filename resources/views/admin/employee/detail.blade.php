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
                    
                        <a href="{{ route('admin.employee.index') }}"><button type="submit" class="btn btn-secondary">Back</button></a>
                        <a href="{{ route('admin.employee.store') }}"><button type="submit" class="btn btn-success">Save</button></a>
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Form-->
                <form class="form" method="POST" action=>
                    <!--begin::Body-->
                    <div class="card-body">
                        <div class="row">
                            <label class="col-xl-3"></label>
                            <div class="col-lg-9 col-xl-6">
                                <h5 class="font-weight-bold mb-6">Customer Info</h5>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Avatar</label>
                            <div class="col-lg-9 col-xl-6">
                                <div class="image-input image-input-outline" id="kt_profile_avatar" style="background-image: url(assets/media/users/blank.png)">
                                    <div class="image-input-wrapper" style="background-image: url(assets/media/users/300_21.jpg)"></div>
                                    <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                        <i class="fa fa-pen icon-sm text-muted"></i>
                                        <input type="file" name="profile_avatar" accept=".png, .jpg, .jpeg" />
                                        <input type="hidden" name="profile_avatar_remove" />
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
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">First Name</label>
                            <div class="col-lg-9 col-xl-6">
                                <input class="form-control form-control-lg form-control-solid" type="text" value="Nick" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Last Name</label>
                            <div class="col-lg-9 col-xl-6">
                                <input class="form-control form-control-lg form-control-solid" type="text" value="Bold" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Gender</label>
                            <div class="col-lg-9 col-xl-6">
                                <input class="form-control form-control-lg form-control-solid" type="text" value="Bold" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">DOB</label>
                            <div class="col-lg-9 col-xl-6">
                                <input class="form-control form-control-lg form-control-solid" type="text" value="Bold" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">CNIC</label>
                            <div class="col-lg-9 col-xl-6">
                                <input class="form-control form-control-lg form-control-solid" type="text" value="Bold" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">ADDRESS</label>
                            <div class="col-lg-9 col-xl-6">
                                <input class="form-control form-control-lg form-control-solid" type="text" value="Bold" />
                            </div>
                        </div>
                        

                        {{-- <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Company Name</label>
                            <div class="col-lg-9 col-xl-6">
                                <input class="form-control form-control-lg form-control-solid" type="text" value="Loop Inc." />
                                <span class="form-text text-muted">If you want your invoices addressed to a company. Leave blank to use your full name.</span>
                            </div>
                        </div> --}}
                        <div class="row">
                            <label class="col-xl-3"></label>
                            <div class="col-lg-9 col-xl-6">
                                <h5 class="font-weight-bold mt-10 mb-6">Contact Info</h5>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Email:</label>
                            <div class="col-lg-9 col-xl-6">
                                <div class="input-group input-group-lg input-group-solid">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="la la-at"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control form-control-lg form-control-solid" value="nick.bold@loop.com" placeholder="Email" />
                                </div>
                                <span class="form-text text-muted">We'll never share your email with anyone else.</span>
                                
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Home Phone:</label>
                            <div class="col-lg-9 col-xl-6">
                                <div class="input-group input-group-lg input-group-solid">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="la la-phone"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control form-control-lg form-control-solid" value="+35278953712" placeholder="Phone" />
                                </div>
                                {{-- <span class="form-text text-muted">We'll never share your email with anyone else.</span> --}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Work Phone:</label>
                            <div class="col-lg-9 col-xl-6">
                                <div class="input-group input-group-lg input-group-solid">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="la la-phone"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control form-control-lg form-control-solid" value="+35278953712" placeholder="Phone" />
                                </div>
                                {{-- <span class="form-text text-muted">We'll never share your email with anyone else.</span> --}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Emergency Contact:</label>
                            <div class="col-lg-9 col-xl-6">
                                <div class="input-group input-group-lg input-group-solid">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="las la-mobile"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control form-control-lg form-control-solid" value="+35278953712" placeholder="Phone" />
                                </div>
                                {{-- <span class="form-text text-muted">We'll never share your email with anyone else.</span> --}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Emergency Phone:</label>
                            <div class="col-lg-9 col-xl-6">
                                <div class="input-group input-group-lg input-group-solid">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="la la-phone"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control form-control-lg form-control-solid" value="+35278953712" placeholder="Phone" />
                                </div>
                                {{-- <span class="form-text text-muted">We'll never share your email with anyone else.</span> --}}
                            </div>
                        </div>
                        <div class="form-group row">

                            <label class="col-xl-3 col-lg-3 col-form-label">Country:</label>
                            <div class="col-lg-9 col-xl-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="la la-city"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control form-control-lg form-control-solid" name="country" placeholder="Enter your country" required/>
                                </div>
                                
                            </div>
                        </div>
                        <div class="form-group row">

                            <label class="col-xl-3 col-lg-3 col-form-label">city:</label>
                            <div class="col-lg-9 col-xl-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="la la-map-marker"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control form-control-lg form-control-solid" name="country" placeholder="Enter your city" required/>
                                </div>
                                
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Postcode:</label>
                            <div class="col-lg-9 col-xl-6">
                                <div class="input-group input-group-lg input-group-solid">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="la la-bookmark-o"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" name="postalCode" placeholder="Enter your postcode" required />
                                    
                                </div>
                                {{-- <span class="form-text text-muted">We'll never share your email with anyone else.</span> --}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Employee Code:</label>
                            <div class="col-lg-9 col-xl-6">
                                <div class="input-group input-group-lg input-group-solid">
                                
                                    <input type="text" class="form-control" name="employeeCode" placeholder="Enter Employee Code" required/>

                                </div>
                                {{-- <span class="form-text text-muted">We'll never share your email with anyone else.</span> --}}
                            </div>
                        </div><div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Hire Date</label>
                            <div class="col-lg-9 col-xl-6">
                                <div class="input-group input-group-lg input-group-solid">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="la la-calendar-check-o"></i>
                                        </span>
                                    </div>
                                <input type="text" class="form-control" name="hireDate" placeholder="Hire Date" id='kt_datepicker2' required/>
                                    
                                </div>
                                {{-- <span class="form-text text-muted">We'll never share your email with anyone else.</span> --}}
                            </div>
                        </div><div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Joining Date</label>
                            <div class="col-lg-9 col-xl-6">
                                <div class="input-group input-group-lg input-group-solid">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="la la-calendar-check-o"></i>
                                        </span>
                                    </div>
                                <input type="text" class="form-control" name="joinDate" placeholder="Join Date" id='kt_datepicker3' required/>

                                </div>
                                {{-- <span class="form-text text-muted">We'll never share your email with anyone else.</span> --}}
                            </div>
                        </div><div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Salary:</label>
                            <div class="col-lg-9 col-xl-6">
                                <div class="input-group input-group-lg input-group-solid">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="las la-coins"></i>
                                        </span>
                                    </div>
                                
                                <input type="number" class="form-control" name="salary" placeholder="Enter employee salary" required/>

                                </div>
                                {{-- <span class="form-text text-muted">We'll never share your email with anyone else.</span> --}}
                            </div>
                        </div><div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Department</label>
                            <div class="col-lg-9 col-xl-6">
                                <div class="input-group input-group-lg input-group-solid">
                                    <div class="input-group-prepend">
                                        
                                    </div>
                                    <input type="text" class="form-control form-control-lg form-control-solid"   placeholder="   Department" />
                                </div>
                                {{-- <span class="form-text text-muted">We'll never share your email with anyone else.</span> --}}
                            </div>
                        </div><div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Designation</label>
                            <div class="col-lg-9 col-xl-6">
                                <div class="input-group input-group-lg input-group-solid">
                                    <div class="input-group-prepend">
                                        
                                    </div>
                                    <input type="text" class="form-control form-control-lg form-control-solid" value="" placeholder="   Designation" />
                                </div>
                                {{-- <span class="form-text text-muted">We'll never share your email with anyone else.</span> --}}
                            </div>
                        </div><div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Location</label>
                            <div class="col-lg-9 col-xl-6">
                                <div class="input-group input-group-lg input-group-solid">
                                    <div class="input-group-prepend">
                                    
                                    </div>
                                    <input type="text" class="form-control form-control-lg form-control-solid" value="" placeholder="   Location" />
                                </div>
                                {{-- <span class="form-text text-muted">We'll never share your email with anyone else.</span> --}}
                            </div>
                        </div><div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Shift</label>
                            <div class="col-lg-9 col-xl-6">
                                <div class="input-group input-group-lg input-group-solid">
                                    <div class="input-group-prepend">
                                        
                                    </div>
                                    <input type="text" class="form-control form-control-lg form-control-solid" value="" placeholder="   Shift" />
                                </div>
                                {{-- <span class="form-text text-muted">We'll never share your email with anyone else.</span> --}}
                            </div>
                        </div>
                        
                        {{-- <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Company Site</label>
                            <div class="col-lg-9 col-xl-6">
                                <div class="input-group input-group-lg input-group-solid">
                                    <input type="text" class="form-control form-control-lg form-control-solid" placeholder="Username" value="loop" />
                                    <div class="input-group-append">
                                        <span class="input-group-text">.com</span>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    <!--end::Body-->
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