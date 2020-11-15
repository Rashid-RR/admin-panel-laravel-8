@extends('admin.layouts.master')

@section('title','Company')

@section('breadcrumb')
    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.companyInformation.index')}}" class="text-muted">Company</a>
        </li>
    </ul>
@endsection

@push('css')

@endpush

@section('content')
   <div class="py-6">
    <div class="col-md-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <div class="card card-custom">
                    <div class="card-header flex-wrap border-0 pt-6 pb-0">
                        <div class="card-title">
                            <h3 class="card-label">Compnay
                                <span class="d-block text-muted pt-2 font-size-sm">All Companies</span></h3>
                        </div>
                        <div class="card-toolbar">
                            <!--begin::Dropdown-->
                            <div class="dropdown dropdown-inline mr-2">
                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                    <!--begin::Navigation-->
                                    <ul class="navi flex-column navi-hover py-2">
                                        <li
                                            class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">
                                            Choose an option:</li>
                                        <li class="navi-item">
                                            <a href="#" class="navi-link">
                                                <span class="navi-icon">
                                                    <i class="la la-print"></i>
                                                </span>
                                                <span class="navi-text">Print</span>
                                            </a>
                                        </li>

                                        <li class="navi-item">
                                            <a href="#" class="navi-link">
                                                <span class="navi-icon">
                                                    <i class="la la-file-excel-o"></i>
                                                </span>
                                                <span class="navi-text">Excel</span>
                                            </a>
                                        </li>
                                        <li class="navi-item">
                                            <a href="#" class="navi-link">
                                                <span class="navi-icon">
                                                    <i class="la la-file-text-o"></i>
                                                </span>
                                                <span class="navi-text">CSV</span>
                                            </a>
                                        </li>
                                        
                                    </ul>
                                    <!--end::Navigation-->
                                </div>
                                <!--end::Dropdown Menu-->
                            </div>
                            <!--end::Dropdown-->
                            <!--begin::Button-->
                            <a href="" data-toggle="modal" data-target="#add1new-modal-lg" class="btn btn-primary font-weight-bolder text-center" >
                                <i class="fas fa-plus"></i>
                                Add New
                            </a>
                            
                            <div class="modal fade" id="add1new-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <form method="POST" action="{{ route('admin.companyInformation.store') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="grid-heading text-color-skyblue font-weight-400 no-padding">Company</h3>
                                                <button class="close mt-modal-close" data-dismiss="modal" type="button"><i class="fa fa-times fa-sm"></i></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Company Type</label>
                                                            <select class="form-control" id="kt_select2_11112233" name="companyType_id">
                                                                <option value="">Select</option>
                                                                @foreach($companyTypes as $item)
                                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Company Title</label>
                                                            <input class="form-control" name="companyTitle" maxlength="500" type="text" autocomplete="off">
                                                            <!---->
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Website Link</label>
                                                            <input class="form-control" name="websiteAddress" maxlength="150" type="url" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Email</label>
                                                            <input class="form-control" name="email" maxlength="250" type="email" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="usr">Salary Method</label>
                                                            <select class="form-control" id="kt_select2_1111223344" name="salaryMethod_id">
                                                                <option value="">Select</option>
                                                                @foreach($salaryMethods as $item)
                                                                    <option value="{{ $item->id }}">{{ $item->methodName }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3 mt-10">
                                                        <label for="CompanyLogo">Company Logo</label>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-lg-9 col-xl-6">
                                                            <div class="image-input image-input-outline" id="kt_image_2">
                                                                <div class="image-input-wrapper" style="background-image: url({{ asset('default_logo.png') }})"></div>
                                                                <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                                                    <i class="fa fa-pen icon-sm"></i>
                                                                    <input type="file" name="companyLogo" accept=".png, .jpg, .jpeg" />
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
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary btn-payday-cancel" data-dismiss="modal" type="button">Cancel</button>
                                                <button class="btn btn-primary" type="submit">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!--begin: Search Form-->
                        <!--begin::Search Form-->
                        <div class="mb-7">
                            <div class="row align-items-center">
                                <div class="col-lg-12 col-xl-12">
                                    <div class="row justify-content-end">
                                        <div class="col-md-3 my-2 my-md-0">
                                            <div class="input-icon">
                                                <input type="text" class="form-control" placeholder="Search..."
                                                    id="kt_datatable_search_query" />
                                                <span>
                                                    <i class="flaticon2-search-1 text-muted"></i>
                                                </span>
                                            </div>
                                        </div>
                                        
                                        
                                    </div>
                                </div>
                                <div class="col-lg-3 col-xl-4 mt-5 mt-lg-0">
                                   
                                </div>
                            </div>
                        </div>
                        <!--end::Search Form-->
                        <!--end: Search Form-->
                        <!--begin: Datatable-->
                        <table class="datatable datatable-bordered datatable-head-custom" id="kt_datatable">
                            <thead>
                                <tr>
                                    <th title="Field #2">Company Title</th>
                                    <th title="Field #3">Website</th>
                                    <th title="Field #4">Email</th>
                                    <th title="Field #6">Salary Method</th>
                                    <th title="Field #1">Company Type</th>
                                    <th title="Field #6">Actions</th>
                                    <th title="Field #7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($companyInformations as $item)
                                <tr>
                                    <td>{{ $item->companyTitle}}</td>
                                    <td>{{ $item->websiteAddress}}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->salarymethod->methodName}}</td>
                                    <td>{{ $item->companytype->name}}</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">

                                            <a href="" id="companyEditBtn" data-toggle="modal" data-id="{{ $item }}" data-target="#edit1new-modal-lg"
                                                class="btn btn-sm btn-clean btn-icon mr-2" title="Edit details"> <span
                                                    class="svg-icon svg-icon-md"> <svg xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"></rect>
                                                            <path
                                                                d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z"
                                                                fill="#000000" fill-rule="nonzero"
                                                                transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) ">
                                                            </path>
                                                            <rect fill="#000000" opacity="0.3" x="5" y="20" width="15"
                                                                height="2" rx="1"></rect>
                                                        </g>
                                                    </svg> </span>
                                            </a>
                                            <a href="" id="companyDetailBtn" data-id="{{ $item }}" data-toggle="modal" data-target="#detail1new-modal-lg"
                                                class="btn btn-sm btn-clean btn-icon mr-2" title="details"> 
                                                <span class="fas fa-eye"> </span> 
                                            </a>
                                            <a href="" id="companyInformationDeleteBtn" data-id="{{ $item->id }}" class="btn btn-sm btn-clean btn-icon" title="Delete" data-toggle="modal" data-target="#deleteDesignation-modal-lg">
                                                <span class="svg-icon svg-icon-md"> <svg xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24"
                                                        version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"></rect>
                                                            <path
                                                                d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z"
                                                                fill="#000000" fill-rule="nonzero"></path>
                                                            <path
                                                                d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
                                                                fill="#000000" opacity="0.3"></path>
                                                        </g>
                                                    </svg> 
                                                </span>
                                            </a>
                                            
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!--end: Datatable-->
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
   </div>

   {{-- Modal Popup --}}

   {{-- for edit --}}
    <div class="modal fade" id="edit1new-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form method="POST" id="companyInfoForm" action="" enctype="multipart/form-data">
                @csrf
                {{ @method_field('PUT') }}
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="grid-heading text-color-skyblue font-weight-400 no-padding">Company  </h3>
                        <button class="close mt-modal-close" data-dismiss="modal" type="button"><i class="fa fa-times fa-sm"></i></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Company Type</label>
                                    <select class="form-control" id="companyTypeSelect" name="companyType_id">
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Company Title</label>
                                    <input class="form-control" value="" id="companyTitle" name="companyTitle" maxlength="500" type="text">
                                    <!---->
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Website Link</label>
                                    <input class="form-control" value="" id="websiteAddress" name="websiteAddress" maxlength="150" type="url">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control" value="" id="companyEmail" name="email" maxlength="250" type="email">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="usr">Salary Method</label>
                                    <select class="form-control" id="salaryMethodSelect" name="salaryMethod_id">
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3 mt-10">
                                <label for="CompanyLogo">Company Logo</label>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-9 col-xl-6">
                                    <div class="image-input image-input-outline" id="kt_image_2">
                                        <div class="image-input-wrapper" style="background-image: url({{ asset( 'companyLogos/'.$item->companyLogo ) }})"></div>
                                        <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                            <i class="fa fa-pen icon-sm"></i>
                                            <input type="file" name="companyLogo" accept=".png, .jpg, .jpeg" />
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
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary btn-payday-cancel" data-dismiss="modal" type="button">Cancel</button>
                        <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i>Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- for detail --}}
    <div class="modal fade" id="detail1new-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="grid-heading text-color-skyblue font-weight-400 no-padding">Company Information</h3>
                    <button class="close mt-modal-close" data-dismiss="modal" type="button"><i class="fa fa-times fa-sm"></i></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Company Type</label>
                                <input class="form-control" value="" id="companyTypeDetail" disabled maxlength="500" type="text">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Company Title</label>
                                <input class="form-control" value="" id="companyTitleDetail" disabled type="text">
                                <!---->
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Website Link</label>
                                <input class="form-control" value="" id="websiteAddressDetail" disabled type="url">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" value="" id="companyEmailDetail" disabled type="email">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="usr">Salary Method</label>
                                <input class="form-control" value="" id="salaryMethodDetail" disabled type="text">
                            </div>
                        </div>
                        <div class="col-sm-3 mt-10">
                            <label for="CompanyLogo">Company Logo</label>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-9 col-xl-6">
                                <div class="image-input image-input-outline" id="kt_image_2">
                                    <div class="image-input-wrapper" id="companyDetailLogo" style="background-image: url({{ asset('companyLogos/'.$item->companyLogo) }})"></div>
                                    <label class="btn btn-xs btn-icon btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                        <input type="file" disabled accept=".png, .jpg, .jpeg" />
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary btn-payday-cancel" data-dismiss="modal" type="button">Cancel</button>
                    
                </div>
            </div>
        </div>
    </div>

    {{-- for delete --}}
    <form novalidate="" method="POST" action="" class="pristine invalid touched" id="companyInformationDeleteData">
        {{ @method_field('DELETE') }}
        @csrf
        <div class="modal fade" id="deleteDesignation-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="grid-heading text-color-skyblue font-weight-400 no-padding">Delete Shift</h3>
                        <button class="close mt-modal-close" data-dismiss="modal" type="button"><i class="fa fa-times fa-sm"></i></button>
                    </div>
                    <div class="modal-body">
                        <div>Are you sure you want to delete this item ?</div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary btn-payday-cancel" data-dismiss="modal" type="button">Cancel</button>
                        <button class="btn btn-danger" id="" type="submit">Confirm</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection

@push('js')

<script>

            var companyTypes = {!! json_encode($companyTypes->toArray()) !!};
            var salaryMethods = {!! json_encode($salaryMethods->toArray()) !!};
          
            console.log(companyTypes);

            //for edit
            $('div').on('click', '#companyEditBtn', function (event) {
                event.preventDefault();
                var companyInfo = $(this).data('id');

                $('#companyTitle').val(companyInfo.companyTitle);
                $('#websiteAddress').val(companyInfo.websiteAddress);
                $('#companyEmail').val(companyInfo.email);

                var options = '';
                
                companyTypes.forEach(x => {
                    if(x.id == companyInfo.companyType_id ){
                        options += `<option value="`+ x.id +`" selected> `+x.name+` </option>`
                    }
                    else{
                        options += `<option value="`+ x.id +`"> `+x.name+` </option>`
                    }
                });

                var options2 = '';
                salaryMethods.forEach(y => {
                    if(y.id == companyInfo.salaryMethod_id){
                        options2 += `<option value="`+ y.id +`" selected>`+y.methodName+`</option>`
                    }else{
                        options2 += `<option value="`+ y.id +`">`+y.methodName+`</option>`
                    }
                });

                document.getElementById('companyTypeSelect').innerHTML = options;
                document.getElementById('salaryMethodSelect').innerHTML = options2;

                $("#companyInfoForm").attr("action", "companyInformation/" + companyInfo.id);
            });

            // for detail
            $('div').on('click', '#companyDetailBtn', function (event) {
                event.preventDefault();
                var companyInfo = $(this).data('id');
                console.log("companyInfo");
                console.log(companyInfo);
                $('#companyTypeDetail').val(companyInfo.companytype.name);
                $('#companyTitleDetail').val(companyInfo.companyTitle);
                $('#websiteAddressDetail').val(companyInfo.websiteAddress);
                $('#companyEmailDetail').val(companyInfo.email);
                $('#employeeRangeDetail').val(companyInfo.employeeRange);
                $('#salaryMethodDetail').val(companyInfo.salarymethod.methodName);
                $('#companyDetailLogo').css('background-image', 'url(' + "/companyLogos/" + companyInfo.companyLogo + ')');

            });

            // for delete
            $('div').on('click', '#companyInformationDeleteBtn', function (event) {
                event.preventDefault();
                var id = $(this).data('id');
                $("#companyInformationDeleteData").attr("action", "companyInformation/" + id);
            });


    "use strict";
    // Class definition

    var KTDatatableHtmlTableDemo = function () {
        // Private functions

        // demo initializer
        var demo = function () {

            var datatable = $('#kt_datatable').KTDatatable({
                data: {
                    saveState: {
                        cookie: false
                    },
                },
                search: {
                    input: $('#kt_datatable_search_query'),
                    key: 'generalSearch'
                },
                columns: [{
                        field: 'DepositPaid',
                        type: 'number',
                    },
                    {
                        field: 'OrderDate',
                        type: 'date',
                        format: 'YYYY-MM-DD',
                    }, {
                        field: 'Status',
                        title: 'Status',
                        autoHide: false,
                        // callback function support for column rendering
                        template: function (row) {
                            var status = {
                                1: {
                                    'title': 'Pending',
                                    'class': ' label-light-warning'
                                },
                                2: {
                                    'title': 'Delivered',
                                    'class': ' label-light-danger'
                                },
                                3: {
                                    'title': 'Canceled',
                                    'class': ' label-light-primary'
                                },
                                4: {
                                    'title': 'Success',
                                    'class': ' label-light-success'
                                },
                                5: {
                                    'title': 'Info',
                                    'class': ' label-light-info'
                                },
                                6: {
                                    'title': 'Danger',
                                    'class': ' label-light-danger'
                                },
                                7: {
                                    'title': 'Warning',
                                    'class': ' label-light-warning'
                                }
                            };
                            return '<span class="label font-weight-bold label-lg' + status[
                                row.Status].class + ' label-inline">' + status[row
                                .Status].title + '</span>';
                        },
                    }, {
                        field: 'Type',
                        title: 'Type',
                        autoHide: false,
                        // callback function support for column rendering
                        template: function (row) {
                            var status = {
                                1: {
                                    'title': 'Online',
                                    'state': 'danger'
                                },
                                2: {
                                    'title': 'Retail',
                                    'state': 'primary'
                                },
                                3: {
                                    'title': 'Direct',
                                    'state': 'success'
                                },
                            };
                            return '<span class="label label-' + status[row.Type].state +
                                ' label-dot mr-2"></span><span class="font-weight-bold text-' +
                                status[row.Type].state + '">' + status[row.Type].title +
                                '</span>';
                        },
                    },
                ],
            });



            $('#kt_datatable_search_status').on('change', function () {
                datatable.search($(this).val().toLowerCase(), 'Status');
            });

            $('#kt_datatable_search_type').on('change', function () {
                datatable.search($(this).val().toLowerCase(), 'Type');
            });

            $('#kt_datatable_search_status, #kt_datatable_search_type').selectpicker();

        };

        return {
            // Public functions
            init: function () {
                // init dmeo
                demo();
            },
        };
    }();

    jQuery(document).ready(function () {
        KTDatatableHtmlTableDemo.init();
    });

    

</script>
@endpush
