@extends('admin.layouts.master')

@section('title','Company Type')

@section('breadcrumb')
  <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.companyType.index')}}" class="text-muted">Company Type</a>
        </li>
        
    </ul> 
@endsection

@push('css')

@endpush

@section('content')
    <div class="col-md-12 py-6">
        <div class="col-md-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <div class="card card-custom">
                        <div class="card-header flex-wrap border-0 pt-6 pb-0">
                            <div class="card-title">
                                <h3 class="card-label">Company Type
                                    <span class="d-block text-muted pt-2 font-size-sm">All Company Types</span></h3>
                            </div>
                            <div class="card-toolbar">
                                <!--begin::Dropdown-->
                                <div class="dropdown dropdown-inline mr-2">
                                </div>
                                <a class="btn btn-primary font-weight-bolder text-center" data-toggle="modal" data-target="#companyTypeadd-modal-lg">
                                    <i class="fas fa-plus"></i>
                                    Add New
                                </a>
                                <div class="modal fade" id="companyTypeadd-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-md">
                                        <form class="pristine invalid touched" action="{{ route('admin.companyType.store') }}" method="POST">
                                            @csrf
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="grid-heading text-color-skyblue font-weight-400 no-padding">Add New Type</h3>
                                                    <button class="close mt-modal-close" data-dismiss="modal" type="button"><i class="fa fa-times fa-sm"></i></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Name*</label>
                                                        <input class="form-control pristine invalid touched" placeholder="Enter Company Type.." name="name" type="text" required>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary btn-payday-cancel" data-dismiss="modal" type="button">Cancel</button>
                                                    <button class="btn btn-primary" id="" type="submit">Save</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                
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
                                        
                                        <th title="Field #1">Company Type</th>
                                        <th title="Field #2">Actions</th>
                                        <th title="Field #3"></th>
                                        <th title="Field #4"></th>
                                        <th title="Field #5"></th>
                                        

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($companytypes as $item)
                                    <tr>
            
                                        <td>{{$item->name}}</td>
                                        <td>
                                            <div class="btn-group mr-1" role="group" aria-label="Basic example">

                                                <a href="#" id="companyTypeEditBtn" data-toggle="modal" data-target="#editadd-modal-lg" data-id="{{ $item }}" class="btn btn-sm btn-clean btn-icon mr-2" title="Edit details"> 
                                                    <span class="svg-icon svg-icon-md"> <svg xmlns="http://www.w3.org/2000/svg"
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
                                                        </svg> 
                                                    </span>
                                                </a>
                                                <form novalidate="" method="POST" action="" class="pristine invalid touched" id="companyTypeEditData">
                                                    {{-- {{ route('admin.department.update',$item->id) }} --}}
                                                    {{ @method_field('PUT') }}
                                                    @csrf
                                                    <div class="modal fade" id="editadd-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-md">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h3 class="grid-heading text-color-skyblue font-weight-400 no-padding">Edit Company Type</h3>
                                                                    <button class="close mt-modal-close" data-dismiss="modal" type="button"><i class="fa fa-times fa-sm"></i></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label>Name*</label>
                                                                        <input class="form-control pristine invalid touched" value="" id="companyTypeName" name="name" maxlength="250" type="text">
                                                                        <!---->
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-secondary btn-payday-cancel" data-dismiss="modal" type="button">Cancel</button>
                                                                    <button class="btn btn-primary" id="" type="submit"><i class="fas fa-save"></i>Update</button>
                                                                    <!---->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                                <a href="" id="companyTypeDetailBtn" data-toggle="modal" data-id="{{ $item }}" data-target="#detailadd-modal-lg"
                                                     class="btn btn-sm btn-clean btn-icon mr-2"> 
                                                     <span class="fas fa-eye"></span> 
                                                </a>
                                                <div class="modal fade" id="detailadd-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-md">
                                                        <form novalidate="" class="pristine invalid touched">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h3 class="grid-heading text-color-skyblue font-weight-400 no-padding">Department Detail</h3>
                                                                    <button class="close mt-modal-close" data-dismiss="modal" type="button"><i class="fa fa-times fa-sm"></i></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label>Name</label>
                                                                        <input class="form-control pristine invalid touched" disabled name="name" id="CompanyTypeDetailName" maxlength="250" type="text">
                                                                        <!---->
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-secondary btn-payday-cancel" data-dismiss="modal" type="button">close</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <a href="" id="companyTypeDeleteBtn" data-toggle="modal" data-target="#deleteadd-modal-lg" data-id="{{ $item->id }}" class="btn btn-sm btn-clean btn-icon" title="Delete">
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
                                                <form novalidate="" method="POST" action="" class="pristine invalid touched" id="companyTypeDeleteData">
                                                    {{-- {{ route('admin.department.update',$item->id) }} --}}
                                                    {{ @method_field('DELETE') }}
                                                    @csrf
                                                    <div class="modal fade" id="deleteadd-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-md">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h3 class="grid-heading text-color-skyblue font-weight-400 no-padding">Delete Company Type</h3>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>

        //for edit modal data
            $('div').on('click', '#companyTypeEditBtn', function (event) {
                event.preventDefault();
                var companyType = $(this).data('id');
                console.log(companyType);
                $('#companyTypeName').val(companyType.name);
                $("#companyTypeEditData").attr("action", "companyType/" + companyType.id);
            });
        //for delete modal data

            $('div').on('click','#companyTypeDeleteBtn',function(event) {
               event.preventDefault();
               var id = $(this).data('id');
               $('#companyTypeDeleteData').attr("action","companyType/" + id); 
            });

        //for detail modal data
            $('div').on('click', '#companyTypeDetailBtn', function (event) {
                event.preventDefault();
                var companyTypeName = $(this).data('id');
                $('#CompanyTypeDetailName').val(companyTypeName.name);
            });


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
