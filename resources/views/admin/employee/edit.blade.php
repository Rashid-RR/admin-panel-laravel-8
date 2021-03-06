@extends('admin.layouts.master')

@section('title','Edit Employee')

@section('breadcrumb')
    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.employee.index')}}" class="text-muted">Employees</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('admin.employee.edit',$employee->id)}}" class="text-muted">Edit Employee</a>
        </li>
    </ul>
@endsection

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
                                            <div class="wizard-title">Document</div>
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
                                        <form class="form mt-0 mt-lg-10" id="kt_form" method="POST" action="{{ route('admin.employee.update',$employee->id) }}"  enctype="multipart/form-data">
                                            @csrf
                                            {{ @method_field('PUT') }}
                                            <!--begin: Wizard Step 1-->
                                            <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">

                                                <div class="form-group row justify">
                                                    <label class="col-lg-3 col-form-label"><b>Profile Picture:</b></label>
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

                                                <div class="mb-10 font-weight-bold text-dark">Enter your Account Details</div>
                                                <!--begin::Input-->
                                                <div class="form-group">
                                                    <label>First Name</label>
                                                    <input type="text" class="form-control" name="firstName" placeholder="First name" value="{{$employee->firstName}}" autocomplete="off" required/>
                                                    <span class="form-text text-muted">Please enter your first name.</span>
                                                </div>
                                                <!--end::Input-->
                                                <!--begin::Input-->
                                                <div class="form-group">
                                                    <label>Last Name</label>
                                                    <input type="text" class="form-control" name="lastName" placeholder="Last name" value="{{$employee->lastName}}" autocomplete="off" required/>
                                                    <span class="form-text text-muted">Please enter your last name.</span>
                                                </div>
                                                <!--end::Input-->
                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <!--begin::Input-->
                                                        <div class="form-group">
                                                            <label for="kt_select2_1">Gender</label>
                                                            <select class="form-control" id="kt_select2_1" name="gender" value="{{ $employee->gender }}" required>
                                                              <option class="active" disabled>Select Gender</option>                                 
                                                              <option value="M" @if($employee->gender == 'M') {{'selected'}} @endif>Male</option>
                                                              <option value="F" @if($employee->gender == 'F') {{'selected'}} @endif>Female</option>
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
                                                            <input type="text" class="form-control" name="dob" placeholder="Birth Date" id='kt_datepicker' value="{{ $employee->dob }}"  required/>
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
                                                            <input type="text" class="form-control" name="cnic" placeholder="Enter your CNIC no." value="{{ $employee->cnic }}" autocomplete="off" required/>   
                                                            <span class="form-text text-muted">Please enter your CNIC number.</span>
                                        
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <!--begin::Input-->
                                                        <div class="form-group">
                                                            <label>Email:</label>
                                                            <input type="email" class="form-control" name="email" placeholder="Enter your email" value="{{ $employee->email }}" autocomplete="off" required />                                                                
                                                            
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
                                                            <input type="tel" class="form-control" name="homePhone" placeholder="Home number" value="{{ $employee->homePhone }}"  autocomplete="off" required />                                                                
                                                            
                                                            <span class="form-text text-muted">Please enter home no.</span>
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <!--begin::Input-->
                                                        <div class="form-group">
                                                            <label>Emergency Contact:</label>
                                                            <input type="text" class="form-control" name="emergencyContact" placeholder="Emergency contact" value="{{ $employee->emergencyContact }}" autocomplete="off" required/>                                                                
                                                            
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
                                                            <input type="tel" class="form-control" name="workPhone" placeholder="Home number" value="{{$employee->workPhone}}" autocomplete="off" required />                                                                
                                                            
                                                            <span class="form-text text-muted">Please enter Work Phone.</span>
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <!--begin::Input-->
                                                        <div class="form-group">
                                                            <label>Emergency Phone:</label>
                                                            <input type="text" class="form-control" name="emergencyPhone" placeholder="Emergency contact" value="{{ $employee->emergencyPhone }}" autocomplete="off" required/>                                                                
                                                            
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
                                                            <input type="text" class="form-control" name="postalCode" placeholder="Postcode" value="{{ $employee->postalCode }}" autocomplete="off"/>
                                                            <span class="form-text text-muted">Please enter your Postcode.</span>
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <!--begin::Input-->
                                                        <div class="form-group">
                                                            <label>City</label>
                                                            <input type="text" class="form-control" name="city" placeholder="City" value=" {{$employee->city}} " autocomplete="off"/>
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
                                                                <select name="country" class="form-control form-control-solid form-control-lg">
                                                                    <option value="">Select</option>
                                                                    <option value="Afghanistan">Afghanistan</option>
                                                                    <option value="ÅlandIslands">Åland Islands</option>
                                                                    <option value="Albania">Albania</option>
                                                                    <option value="Algeria">Algeria</option>
                                                                    <option value="American">American Samoa</option>
                                                                    <option value="Andorra">Andorra</option>
                                                                    <option value="Angola">Angola</option>
                                                                    <option value="Anguilla">Anguilla</option>
                                                                    <option value="Antarctica">Antarctica</option>
                                                                    <option value="AntiguaandBarbuda">Antigua and Barbuda</option>
                                                                    <option value="Argentina">Argentina</option>
                                                                    <option value="Aruba">Aruba</option>
                                                                    <option value="Australia" >Australia</option>
                                                                    <option value="Austria">Austria</option>
                                                                    <option value="Azerbaijan">Azerbaijan</option>
                                                                    <option value="Bahamas">Bahamas</option>
                                                                    <option value="Bahrain">Bahrain</option>
                                                                    <option value="Bangladesh">Bangladesh</option>
                                                                    <option value="Barbados">Barbados</option>
                                                                    <option value="Belarus">Belarus</option>
                                                                    <option value="Belgium">Belgium</option>
                                                                    <option value="Belize">Belize</option>
                                                                    <option value="Benin">Benin</option>
                                                                    <option value="Bermuda">Bermuda</option>
                                                                    <option value="Bhutan">Bhutan</option>
                                                                    <option value="Bolivia, Plurinational State of">Bolivia, Plurinational State of</option>
                                                                    <option value="Bonaire, Sint Eustatius and Saba">Bonaire, Sint Eustatius and Saba</option>
                                                                    <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                                                    <option value="Botswana">Botswana</option>
                                                                    <option value="Bouvet">Bouvet Island</option>
                                                                    <option value="Brazil">Brazil</option>
                                                                    <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                                                    <option value="Brunei Darussalam">Brunei Darussalam</option>
                                                                    <option value="Bulgaria">Bulgaria</option>
                                                                    <option value="Burkina Faso">Burkina Faso</option>
                                                                    <option value="Burundi">Burundi</option>
                                                                    <option value="Cambodia">Cambodia</option>
                                                                    <option value="Cameroon">Cameroon</option>
                                                                    <option value="Canada">Canada</option>
                                                                    <option value="Cape Verde">Cape Verde</option>
                                                                    <option value="Cayman Islands">Cayman Islands</option>
                                                                    <option value="Central African Republic">Central African Republic</option>
                                                                    <option value="Chad">Chad</option>
                                                                    <option value="Chile">Chile</option>
                                                                    <option value="China">China</option>
                                                                    <option value="Christmas Island">Christmas Island</option>
                                                                    <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                                                    <option value="Colombia">Colombia</option>
                                                                    <option value="Comoros">Comoros</option>
                                                                    <option value="Congo">Congo</option>
                                                                    <option value="Congo, the Democratic Republic of the">Congo, the Democratic Republic of the</option>
                                                                    <option value="Cook Islands">Cook Islands</option>
                                                                    <option value="Costa Rica">Costa Rica</option>
                                                                    <option value="Côte d'Ivoire">Côte d'Ivoire</option>
                                                                    <option value="Croatia">Croatia</option>
                                                                    <option value="Cuba">Cuba</option>
                                                                    <option value="Curaçao">Curaçao</option>
                                                                    <option value="Cyprus">Cyprus</option>
                                                                    <option value="Czech Republic">Czech Republic</option>
                                                                    <option value="Denmark">Denmark</option>
                                                                    <option value="Djibouti">Djibouti</option>
                                                                    <option value="Dominica">Dominica</option>
                                                                    <option value="Dominican Republic">Dominican Republic</option>
                                                                    <option value="Ecuador">Ecuador</option>
                                                                    <option value="Egypt">Egypt</option>
                                                                    <option value="El Salvador">El Salvador</option>
                                                                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                                    <option value="Eritrea">Eritrea</option>
                                                                    <option value="Estonia">Estonia</option>
                                                                    <option value="Ethiopia">Ethiopia</option>
                                                                    <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                                                    <option value="Faroe Islands">Faroe Islands</option>
                                                                    <option value="Fiji">Fiji</option>
                                                                    <option value="Finland">Finland</option>
                                                                    <option value="France">France</option>
                                                                    <option value="French Guiana">French Guiana</option>
                                                                    <option value="French Polynesia">French Polynesia</option>
                                                                    <option value="French Southern Territories">French Southern Territories</option>
                                                                    <option value="Gabon">Gabon</option>
                                                                    <option value="Gambia">Gambia</option>
                                                                    <option value="Georgia">Georgia</option>
                                                                    <option value="Germany">Germany</option>
                                                                    <option value="Ghana">Ghana</option>
                                                                    <option value="Gibraltar">Gibraltar</option>
                                                                    <option value="Greece">Greece</option>
                                                                    <option value="Greenland">Greenland</option>
                                                                    <option value="Grenada">Grenada</option>
                                                                    <option value="Guadeloupe">Guadeloupe</option>
                                                                    <option value="Guam">Guam</option>
                                                                    <option value="Guatemala">Guatemala</option>
                                                                    <option value="Guernsey">Guernsey</option>
                                                                    <option value="Guinea">Guinea</option>
                                                                    <option value="Guinea-Bissau">Guinea-Bissau</option>
                                                                    <option value="Guyana">Guyana</option>
                                                                    <option value="Haiti">Haiti</option>
                                                                    <option value="Heard Island and McDonald Islands">Heard Island and McDonald Islands</option>
                                                                    <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                                                    <option value="Honduras">Honduras</option>
                                                                    <option value="Hong Kong">Hong Kong</option>
                                                                    <option value="Hungary">Hungary</option>
                                                                    <option value="Iceland">Iceland</option>
                                                                    <option value="India">India</option>
                                                                    <option value="Indonesia">Indonesia</option>
                                                                    <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                                                    <option value="Iraq">Iraq</option>
                                                                    <option value="Ireland">Ireland</option>
                                                                    <option value="Isle of Man">Isle of Man</option>
                                                                    <option value="Israel">Israel</option>
                                                                    <option value="Italy">Italy</option>
                                                                    <option value="Jamaica">Jamaica</option>
                                                                    <option value="Japan">Japan</option>
                                                                    <option value="Jersey">Jersey</option>
                                                                    <option value="Jordan">Jordan</option>
                                                                    <option value="Kazakhstan">Kazakhstan</option>
                                                                    <option value="Kenya">Kenya</option>
                                                                    <option value="Kiribati">Kiribati</option>
                                                                    <option value="KKorea, Democratic People's Republic ofP">Korea, Democratic People's Republic of</option>
                                                                    <option value="KR">Korea, Republic of</option>
                                                                    <option value="Kuwait">Kuwait</option>
                                                                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                                    <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                                                                    <option value="Latvia">Latvia</option>
                                                                    <option value="Lebanon">Lebanon</option>
                                                                    <option value="Lesotho">Lesotho</option>
                                                                    <option value="Liberia">Liberia</option>
                                                                    <option value="Libya">Libya</option>
                                                                    <option value="Liechtenstein">Liechtenstein</option>
                                                                    <option value="Lithuania">Lithuania</option>
                                                                    <option value="Luxembourg">Luxembourg</option>
                                                                    <option value="Macao">Macao</option>
                                                                    <option value="Macedonia, the former Yugoslav Republic of">Macedonia, the former Yugoslav Republic of</option>
                                                                    <option value="Madagascar">Madagascar</option>
                                                                    <option value="Malawi">Malawi</option>
                                                                    <option value="Malaysia">Malaysia</option>
                                                                    <option value="Maldives">Maldives</option>
                                                                    <option value="Mali">Mali</option>
                                                                    <option value="Malta">Malta</option>
                                                                    <option value="Marshall Islands">Marshall Islands</option>
                                                                    <option value="Martinique">Martinique</option>
                                                                    <option value="Mauritania">Mauritania</option>
                                                                    <option value="Mauritius">Mauritius</option>
                                                                    <option value="Mayotte">Mayotte</option>
                                                                    <option value="Mexico">Mexico</option>
                                                                    <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                                                                    <option value="Moldova, Republic of">Moldova, Republic of</option>
                                                                    <option value="Monaco">Monaco</option>
                                                                    <option value="Mongolia">Mongolia</option>
                                                                    <option value="Montenegro">Montenegro</option>
                                                                    <option value="Montserrat">Montserrat</option>
                                                                    <option value="Morocco">Morocco</option>
                                                                    <option value="Mozambique">Mozambique</option>
                                                                    <option value="Myanmar">Myanmar</option>
                                                                    <option value="Namibia">Namibia</option>
                                                                    <option value="Nauru">Nauru</option>
                                                                    <option value="Nepal">Nepal</option>
                                                                    <option value="Netherlands">Netherlands</option>
                                                                    <option value="New Caledonia">New Caledonia</option>
                                                                    <option value="New Zealand">New Zealand</option>
                                                                    <option value="Nicaragua">Nicaragua</option>
                                                                    <option value="Niger">Niger</option>
                                                                    <option value="Nigeria">Nigeria</option>
                                                                    <option value="Niue">Niue</option>
                                                                    <option value="Norfolk Island">Norfolk Island</option>
                                                                    <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                                                    <option value="Norway">Norway</option>
                                                                    <option value="Oman">Oman</option>
                                                                    <option value="Pakistan" selected="selected">Pakistan</option>
                                                                    <option value="Palau">Palau</option>
                                                                    <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                                                                    <option value="Panama">Panama</option>
                                                                    <option value="Papua New Guinea">Papua New Guinea</option>
                                                                    <option value="Paraguay">Paraguay</option>
                                                                    <option value="Peru">Peru</option>
                                                                    <option value="Philippines">Philippines</option>
                                                                    <option value="Pitcairn">Pitcairn</option>
                                                                    <option value="Poland">Poland</option>
                                                                    <option value="Portugal">Portugal</option>
                                                                    <option value="Puerto Rico">Puerto Rico</option>
                                                                    <option value="Qatar">Qatar</option>
                                                                    <option value="Réunion">Réunion</option>
                                                                    <option value="Romania">Romania</option>
                                                                    <option value="Russian Federation">Russian Federation</option>
                                                                    <option value="Rwanda">Rwanda</option>
                                                                    <option value="Saint Barthélemy">Saint Barthélemy</option>
                                                                    <option value="Saint Helena, Ascension and Tristan da Cunha">Saint Helena, Ascension and Tristan da Cunha</option>
                                                                    <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                                                    <option value="Saint Lucia">Saint Lucia</option>
                                                                    <option value="Saint Martin (French part)">Saint Martin (French part)</option>
                                                                    <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                                                    <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                                                                    <option value="Samoa">Samoa</option>
                                                                    <option value="San Marino">San Marino</option>
                                                                    <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                                                    <option value="Senegal">Senegal</option>
                                                                    <option value="Serbia">Serbia</option>
                                                                    <option value="Seychelles">Seychelles</option>
                                                                    <option value="Sierra Leone">Sierra Leone</option>
                                                                    <option value="Singapore">Singapore</option>
                                                                    <option value="Sint Maarten (Dutch part)">Sint Maarten (Dutch part)</option>
                                                                    <option value="Slovakia">Slovakia</option>
                                                                    <option value="Slovenia">Slovenia</option>
                                                                    <option value="Solomon Islands">Solomon Islands</option>
                                                                    <option value="Somalia">Somalia</option>
                                                                    <option value="South Africa">South Africa</option>
                                                                    <option value="South Georgia and the South Sandwich Islands">South Georgia and the South Sandwich Islands</option>
                                                                    <option value="South Sudan">South Sudan</option>
                                                                    <option value="Spain">Spain</option>
                                                                    <option value="Sri Lanka">Sri Lanka</option>
                                                                    <option value="Sudan">Sudan</option>
                                                                    <option value="Suriname">Suriname</option>
                                                                    <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                                                    <option value="Swaziland">Swaziland</option>
                                                                    <option value="Sweden">Sweden</option>
                                                                    <option value="Switzerland">Switzerland</option>
                                                                    <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                                                    <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                                                                    <option value="Tajikistan">Tajikistan</option>
                                                                    <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                                                    <option value="Thailand">Thailand</option>
                                                                    <option value="Timor-Leste">Timor-Leste</option>
                                                                    <option value="Togo">Togo</option>
                                                                    <option value="Tokelau">Tokelau</option>
                                                                    <option value="Tonga">Tonga</option>
                                                                    <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                                                    <option value="Tunisia">Tunisia</option>
                                                                    <option value="Turkey">Turkey</option>
                                                                    <option value="Tuvalu">Tuvalu</option>
                                                                    <option value="Uganda">Uganda</option>
                                                                    <option value="Ukraine">Ukraine</option>
                                                                    <option value="United Arab Emirates">United Arab Emirates</option>
                                                                    <option value="United Kingdom">United Kingdom</option>
                                                                    <option value="United States">United States</option>
                                                                    <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                                                    <option value="Uruguay">Uruguay</option>
                                                                    <option value="Uzbekistan">Uzbekistan</option>
                                                                    <option value="Vanuatu">Vanuatu</option>
                                                                    <option value="Venezuela, Bolivarian Republic of">Venezuela, Bolivarian Republic of</option>
                                                                    <option value="Viet Nam">Viet Nam</option>
                                                                    <option value="Virgin Islands, British">Virgin Islands, British</option>
                                                                    <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                                                    <option value="Wallis and Futuna">Wallis and Futuna</option>
                                                                    <option value="Western Sahara">Western Sahara</option>
                                                                    <option value="Yemen">Yemen</option>
                                                                    <option value="Zambia">Zambia</option>
                                                                    <option value="Zimbabwe">Zimbabwe</option>
                                                                </select>
                                                                  <span class="form-text text-muted">Please select your Country.</span>
                                                        </div>
                                                        <!--end::Select-->
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Employee Address</label>
                                                    <input type="text" class="form-control" name="employeeAddress" placeholder="Address Line 1" value="{{ $employee->employeeAddress }}" autocomplete="off"/>
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
                                                            <input type="text" class="form-control" name="employeeCode" placeholder="Enter Employee Code" value="{{$employee->employeeCode}}" autocomplete="off" required/>
                                                            <span class="form-text text-muted">Please employee code.</span>
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <!--begin::Input-->
                                                        <div class="form-group">
                                                            <label>Hire Date<span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" name="hireDate" placeholder="Hire Date" id='kt_datepicker2' value="{{ $employee->hireDate }}" autocomplete="off" required/>                                                                

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
                                                            <input type="text" class="form-control" name="joinDate" placeholder="Join Date" id='kt_datepicker3' value="{{ $employee->joinDate }}" autocomplete="off" required/>                                                                
                                                            
                                                            <span class="form-text text-muted">Select your joining date.</span>
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <!--begin::Input-->
                                                        <div class="form-group">
                                                            <label>Salary:</label>
                                                            <input type="number" class="form-control" name="salary" placeholder="Enter employee salary" value="{{ $employee->salary }}" autocomplete="off" required/>                                                                
                                                            
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
                                                            <select class="form-control" id="kt_select2_111" name="department_id">
                                                                <option value="">Select</option>
                                                                @foreach ($departments as $item)
                                                                    <option value="{{ $item->id }}" @if($employee->department_id == $item->id) {{'selected'}} @endif>{{ $item->deptName }}</option>
                                                                @endforeach
                                                            </select>
                                                            <span class="form-text text-muted">Please select an department.</span>
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <!--begin::Input-->
                                                        <div class="form-group">
                                                            <label>Designations<span class="text-danger">*</span></label>
                                                            <select class="form-control" id="kt_select2_1111" name="designation_id">
                                                                <option value="">Select</option>
                                                                @foreach ($designations as $item)
                                                                    <option value="{{ $item->id }}" @if($employee->designation_id == $item->id) {{'selected'}} @endif>{{ $item->name }}</option>
                                                                @endforeach
                                                            </select>
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
                                                            <select class="form-control" id="kt_select2_11112" name="location_id">
                                                                <option value="">Select</option>
                                                                @foreach ($locations as $item)
                                                                    <option value="{{ $item->id }}" @if($employee->location_id == $item->id) {{'selected'}} @endif>{{ $item->location }}</option>
                                                                @endforeach
                                                            </select>
                                                            <span class="form-text text-muted">Please select an location.</span>
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <!--begin::Input-->
                                                        <div class="form-group">
                                                            <label>Shift *</label>
                                                            <select class="form-control" id="kt_select2_111122" name="shift_id">
                                                                @foreach ($shifts as $item)
                                                                    <option value="{{ $item->id }}" @if($employee->shift_id == $item->id) {{'selected'}} @endif>{{ $item->name }}</option>
                                                                @endforeach
                                                            </select>
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
                                                                <input type="text" class="form-control" name="name" value="{{$documentById->name}}" id="name" placeholder="e.g cv,resume etc" minlength="4" maxlength="12" autocomplete="off"/>
                                                        
                                                                <span class="form-text text-muted">Please enter your Document Name.</span>
                                                            </div>
                                                            <!--end::Input-->
                                                        </div>
                                                        <div class="col-xl-6">
                                                            <!--begin::Input-->
                                                            <div class="form-group">
                                                                <label>Expire Date<span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="expiryDate" value="{{$documentById->expiryDate}}" placeholder="Expire Date" id='kt_datepicker8' autocomplete="off"/>
                                                                <span class="form-text text-muted"></span>
                                                            </div>
                                                            <!--end::Input-->
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>File Browser</label>
                                                        <div></div>
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" value="{{ asset('employeesDocument/'.$documentById->image) }}" id="customFile" name="image"/>
                                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Document Type<span class="text-danger">*</span></label>
                                                        <select class="form-control" id="kt_select2_1111223344555" name="type">
                                                            <option value="" selected disabled>Select</option>
                                                            <option value="1" @if($documentById->documentType_id === 1) {{'selected'}} @endif>Resume</option>
                                                            <option value="2" @if($documentById->documentType_id === 2) {{'selected'}} @endif>Certificate</option>
                                                            <option value="3" @if($documentById->documentType_id === 3) {{'selected'}} @endif>CV</option>
                                                            <option value="4" @if($documentById->documentType_id === 4) {{'selected'}} @endif>Others</option>
                                                        </select>
                                                        <span class="form-text text-muted">Please select an document type</span>
                                                    </div>
                                                </div>

                                            @else

                                                <div class="pb-5" data-wizard-type="step-content">
                                                    <div class="mb-10 font-weight-bold text-dark">Enter your Document Details</div>
                                                    <div class="row">
                                                        <div class="col-xl-6">
                                                            <!--begin::Input-->
                                                            <div class="form-group">
                                                                <label>Document Name</label>
                                                                <input type="text" class="form-control" name="name" value="" id="name" placeholder="e.g cv,resume etc" minlength="4" maxlength="12" autocomplete="off"/>
                                                        
                                                                <span class="form-text text-muted">Please enter your Document Name.</span>
                                                            </div>
                                                            <!--end::Input-->
                                                        </div>
                                                        <div class="col-xl-6">
                                                            <!--begin::Input-->
                                                            <div class="form-group">
                                                                <label>Expire Date<span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="expiryDate" value="" placeholder="Expire Date" id='kt_datepicker8' autocomplete="off"/>
                                                                <span class="form-text text-muted"></span>
                                                            </div>
                                                            <!--end::Input-->
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>File Browser</label>
                                                        <div></div>
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" value="" id="customFile" name="image"/>
                                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Document Type<span class="text-danger">*</span></label>
                                                        <select class="form-control" id="kt_select2_1111223344555" name="type">
                                                            <option value="" selected disabled>Select</option>
                                                            <option value="1">Resume</option>
                                                            <option value="2">Certificate</option>
                                                            <option value="3">CV</option>
                                                            <option value="4">Others</option>
                                                        </select>
                                                        <span class="form-text text-muted">Please select an document type</span>
                                                    </div>
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
                                                    <button type="submit" class="btn btn-success font-weight-bolder text-uppercase px-9 py-4" class="nextBtn" data-wizard-type="action-submit"><i class="fas fa-save"></i> Update</button>
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
<script src="{{ asset('js/pages/crud/forms/validation/form-controls.js')}}"></script>
    <script>

    </script>
@endpush
