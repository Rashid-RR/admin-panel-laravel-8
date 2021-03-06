@extends('admin.layouts.master')

@section('title','Employees')

@section('breadcrumb')
    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.employee.index')}}" class="text-muted">Employees</a>
        </li>
    </ul>
@endsection

@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
<link href="{{ asset('css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
        <div class="col-md-12 py-6">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <div class="card card-custom">
                        <div class="card-header flex-wrap border-0 pt-6 pb-0">
                            <div class="card-title">
                                <h3 class="card-label">Employees
                                    <span class="d-block text-muted pt-2 font-size-sm">All employees</span></h3>
                            </div>
                            <div class="card-toolbar">
                                <!--begin::Dropdown-->
                                <div class="dropdown dropdown-inline mr-2">
                                    <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="svg-icon svg-icon-md">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/PenAndRuller.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path
                                                        d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z"
                                                        fill="#000000" opacity="0.3" />
                                                    <path
                                                        d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z"
                                                        fill="#000000" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>Export
                                    </button>
                                    <button type="button" class="btn btn-light-primary font-weight-bolder" data-toggle="modal" data-target="#import-modal"
                                        aria-haspopup="true" aria-expanded="false">
                                        <span class="svg-icon svg-icon-md">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/PenAndRuller.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path
                                                        d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z"
                                                        fill="#000000" opacity="0.3" />
                                                    <path
                                                        d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z"
                                                        fill="#000000" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>Import</button>
                                        <div class="modal fade" id="import-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="">
                                                <div class="modal-content">
                                                    
                                                    <div class="modal-header">
                                                        <h2 class="modal-title" id="exampleModalLabel">Import Employee CSV</h2>
                                                        <button class="close mt-modal-close" data-dismiss="modal" type="button"><i class="fa fa-times fa-sm"></i></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="col-lg-12 col-md-9 col-sm-12">
                                                            {{-- <form method="post" action="{{ route('admin.emp.importCSV2') }}" enctype="multipart/form-data" class="dropzone dropzone-default" id="dropzone">
                                                            @csrf
                                                            <div class="dropzone-msg dz-message needsclick" id="dZUpload">
                                                                <h3 class="dropzone-msg-title">Drop files here or click to upload.</h3>
                                                                <span class="dropzone-msg-desc">Drag or drop files to upload</span>
                                                            </div>
                                                            </form> --}}
                                                            <form method="post">
                                                                @csrf
                                                                <div class="dropzone dropzone-default" id="dropzone">
                                                                    <div class="dropzone-msg dz-message needsclick" id="dZUpload">
                                                                        <h3 class="dropzone-msg-title">Drop files here or click to upload.</h3>
                                                                        <span class="dropzone-msg-desc">Drag or drop files to upload</span>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary" id="sheetUploadBtn">Upload</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    <!--begin::Dropdown Menu-->
                                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                        <!--begin::Navigation-->
                                        <ul class="navi flex-column navi-hover py-2">
                                            <li
                                                class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">
                                                Choose an option:</li>
                                            <li class="navi-item">
                                                <a href="#" class="navi-link" onclick="makepdf()">
                                                    <span class="navi-icon">
                                                        <i class="la la-print"></i>
                                                    </span>
                                                    <span class="navi-text">Print</span>
                                                </a>
                                            </li>
                                            <li class="navi-item">
                                                <a href="{{ route('admin.emp.exportEXCEL') }}" class="navi-link">
                                                    <span class="navi-icon">
                                                        <i class="la la-file-excel-o"></i>
                                                    </span>
                                                    <span class="navi-text">Excel</span>
                                                </a>
                                            </li>
                                            <li class="navi-item">
                                                <a href="{{ route('admin.emp.exportCSV') }}" class="navi-link">
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
                                <a href="{{ route('admin.employee.create') }}" class="btn btn-primary font-weight-bolder text-center">
                                    <i class="fas fa-plus"></i>
                                    Add New
                                </a>
                                <!--end::Button-->
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
                                            {{-- <div class="col-md-4 my-2 my-md-0">
                                                <div class="d-flex align-items-center">
                                                    <label class="mr-3 mb-0 d-none d-md-block">Designation</label>
                                                    <select class="form-control" id="kt_datatable_search_status">
                                                        <option value="">All</option>
                                                        <option value="1">Team Leader</option>
                                                        <option value="2">Garphic Designer</option>
                                                        <option value="3">IOS Developer</option>
                                                        <option value="4">Android Developer</option>
                                                        <option value="5">PHP Developer</option>
                                                        <option value="6">Front-End Developer</option>
                                                    </select>
                                                </div>
                                            </div> --}}
                                            
                                            
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                            </div>
                            <!--end::Search Form-->
                            <!--end: Search Form-->
                            <!--begin: Datatable-->
                            <table class="datatable datatable-bordered datatable-head-custom" id="kt_datatable">
                                <thead>
                                    
                                    <tr>
                                        <th title="Field #1">Full Name</th>
                                        <th title="Field #2">Phone</th>
                                        <th title="Field #3">CNIC</th>
                                        <th title="Field #4">Designation</th>
                                        <th title="Field #5">Department</th>
                                        <th title="Field #6">Email</th>
                                        <th title="Field #6">Actions</th>
                                        <th title="Field #7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($employees as $item)
                                    <tr>
                                        <td>{{ $item->firstName .' '. $item->lastName }}
                                        </td>
                                        <td>{{ $item->emergencyPhone }}</td>
                                        <td>{{ $item->cnic }}</td>
                                        <td>{{ $item->designation->name }}</td>
                                        <td>{{ $item->department->deptName }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">

                                                <a href="{{ route('admin.employee.edit', $item->id) }}"
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
                                                <a href="{{ route('admin.employee.show', $item->id) }}" 
                                                    class="btn btn-sm btn-clean btn-icon mr-2" title="details"> 
                                                    <span class="fas fa-eye"></span> </a>
                                                {{-- <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Delete">
                                                    <span class="svg-icon svg-icon-md"> <svg xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                            height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                                <path
                                                                    d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z"
                                                                    fill="#000000" fill-rule="nonzero"></path>
                                                                <path
                                                                    d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
                                                                    fill="#000000" opacity="0.3"></path>
                                                            </g>
                                                        </svg> </span> 
                                                </a> --}}
                                                <a href="" id="deleteEmpBtn" data-toggle="modal" data-target="#deleteEmpadd-modal-lg" data-id="{{ $item->id }}" class="btn btn-sm btn-clean btn-icon" title="Delete">
                                                    <span class="svg-icon svg-icon-md"> <svg xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                            height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                                <path
                                                                    d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z"
                                                                    fill="#000000" fill-rule="nonzero"></path>
                                                                <path
                                                                    d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
                                                                    fill="#000000" opacity="0.3"></path>
                                                            </g>
                                                        </svg> </span> 
                                                </a>
                                                <form novalidate="" method="POST" action="" class="pristine invalid touched" id="employeeDeleteData">
                                                    {{-- {{ route('admin.department.update',$item->id) }} --}}
                                                    {{ @method_field('DELETE') }}
                                                    @csrf
                                                    <div class="modal fade" id="deleteEmpadd-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-md">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h3 class="grid-heading text-color-skyblue font-weight-400 no-padding">Delete Department</h3>
                                                                    <button class="close mt-modal-close" data-dismiss="modal" type="button"><i class="fa fa-times fa-sm"></i></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div>Are you sure you want to delete this item ?</div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-secondary btn-payday-cancel" data-dismiss="modal" type="button">Cancel</button>
                                                                    <button class="btn btn-danger" id="" type="submit">Confirm</button>
                                                                    <!---->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!--end: Datatable-->

                            {{-- for print page --}}

                            <table class="datatable datatable-bordered datatable-head-custom" style="display: none;" id="forPrint">
                                <thead>
                                    
                                    <tr>
                                        <th title="Field #1">Full Name</th>
                                        <th title="Field #2">Phone</th>
                                        <th title="Field #3">CNIC</th>
                                        <th title="Field #4">Designation</th>
                                        <th title="Field #5">Department</th>
                                        <th title="Field #6">Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($employees as $item2)
                                    <tr>
                                        <td>{{ $item2->firstName .' '. $item2->lastName }}
                                        </td>
                                        <td>{{ $item2->emergencyPhone }}</td>
                                        <td>{{ $item2->cnic }}</td>
                                        <td>{{ $item2->designation->name }}</td>
                                        <td>{{ $item2->department->deptName }}</td>
                                        <td>{{ $item2->email }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@push('js')


<script src="{{ asset('js/pages/crud/file-upload/dropzonejs.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
{{-- <script src="{{ asset('js/pages/crud/datatables/basic/basic.js')}}"></script> --}}

<script>

    $('div').on('click','#deleteEmpBtn',function (event) {
        event.preventDefault();
        var id = $(this).data('id');
        console.log(id);
        $('#employeeDeleteData').attr("action","employee/" + id); 
    });

    function makepdf(){
        var printMe = document.getElementById('forPrint');
        document.getElementById('forPrint').style.display = "block";
        var wme = window.open("", "", "width:100%,height:100%");
        wme.document.write(printMe.outerHTML);
        wme.document.close();
        wme.focus();
        wme.print();
        document.getElementById('forPrint').style.display = "none";
    }

    "use strict";
    // Class definition

    Dropzone.options.dropzone = {
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        autoProcessQueue: false,
        url: '/employee/importCSV2',
        createImageThumbnails: true,
        autoDiscover: false,
        addRemoveLinks: true,

        init: function () {

            var myDropzone = this;

            // Update selector to match your button
            $("#sheetUploadBtn").click(function (e) {
                e.preventDefault();
                myDropzone.processQueue();
            });

            this.on('sending', function(file, xhr, formData) {
                // Append all form inputs to the formData Dropzone will POST
                var data = $('#dropzone').serializeArray();
                $.each(data, function(key, el) {
                    formData.append(el.name, el.value);
                });
            });
            // this.on("complete", function(xhr, formData) {
            // swal({
            //         title: "Success",
            //         text: "Files successfully uploaded",
            //         type: "success",
            //         timer: 3000,
            //         showConfirmButton: false
            //     },
            //     setTimeout(function () {
            //         location.reload();
            //     }, 2300)
            // );
            // });

            // this.on("error", function(xhr, formData) {
            // swal({
            //         title: "Whoops!",
            //         text: "Files not uploaded, there was a problem.",
            //         type: "error",
            //         timer: 3000,
            //         showConfirmButton: false
            //     },
            //     setTimeout(function () {
            //         location.reload();
            //     }, 2300)
            // );
            // });
        }
    }



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
                            // var status = {
                            //     1: {
                            //         'title': 'Pending',
                            //         'class': ' label-light-warning'
                            //     },
                            //     2: {
                            //         'title': 'Delivered',
                            //         'class': ' label-light-danger'
                            //     },
                            //     3: {
                            //         'title': 'Canceled',
                            //         'class': ' label-light-primary'
                            //     },
                            //     4: {
                            //         'title': 'Success',
                            //         'class': ' label-light-success'
                            //     },
                            //     5: {
                            //         'title': 'Info',
                            //         'class': ' label-light-info'
                            //     },
                            //     6: {
                            //         'title': 'Danger',
                            //         'class': ' label-light-danger'
                            //     },
                            //     7: {
                            //         'title': 'Warning',
                            //         'class': ' label-light-warning'
                            //     }
                            // };
                            // return '<span class="label font-weight-bold label-lg' + status[
                            //     row.Status].class + ' label-inline">' + status[row
                            //     .Status].title + '</span>';
                        },
                    }, {
                        field: 'Type',
                        title: 'Type',
                        autoHide: false,
                        // callback function support for column rendering
                        template: function (row) {
                            // var status = {
                            //     1: {
                            //         'title': 'Online',
                            //         'state': 'danger'
                            //     },
                            //     2: {
                            //         'title': 'Retail',
                            //         'state': 'primary'
                            //     },
                            //     3: {
                            //         'title': 'Direct',
                            //         'state': 'success'
                            //     },
                            // };
                            // return '<span class="label label-' + status[row.Type].state +
                            //     ' label-dot mr-2"></span><span class="font-weight-bold text-' +
                            //     status[row.Type].state + '">' + status[row.Type].title +
                            //     '</span>';
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

    function myFunction() {
    $('#kt_datatable').DataTable( {
   
    });
   }

</script>
@endpush
