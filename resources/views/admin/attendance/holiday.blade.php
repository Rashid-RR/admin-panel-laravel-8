@extends('admin.layouts.master')

@section('title','Add Holidays')

@section('breadcrumb')
<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
    <li class="breadcrumb-item">
        <a href="{{ route('admin.attendances')}}" class="text-muted">Attendances</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('admin.holiday.index')}}" class="text-muted">Holidays</a>
    </li>
</ul>
@endsection

@push('css')
{{-- <link href="{{ asset('https://app.paypeople.pk/assets/app/css/bootstrap.min.css')}}" rel="stylesheet"
type="text/css" />
<link href="{{ asset('https://app.paypeople.pk/assets/app/css/font-awesome.min.css')}}" rel="stylesheet"
    type="text/css" />
<link href="{{ asset('https://app.paypeople.pk/assets/app/css/fonts.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css')}}" rel="stylesheet"
    type="text/css" />
<link href="{{ asset('https://fonts.googleapis.com/css?family=Tajawal:400,700,800,900&display=swap')}}" rel="stylesheet"
    type="text/css" /> --}}




@endpush


@section('content')
<div class="py-6">
    <div class="col-md-12">
        <a href="{{ route('admin.attendances')}}" class="btn btn-light-primary font-weight-bolder mb-2 mt-4">
            <i class="ki ki-long-arrow-back icon-sm"></i>Back
        </a>
        <div class="card card-primary card-outline">
            <div class="card-header">
                <div class="card card-custom">
                    <div class="card-header flex-wrap border-0 pt-6 pb-0">
                        <div class="card-title">
                            <h3 class="card-label">Holidays
                                <span class="d-block text-muted pt-2 font-size-sm">All Holidays</span></h3>
                        </div>
                        <div class="card-toolbar">
                            <!--begin::Button-->
                            <a href="" data-toggle="modal" data-target="#addholiday-modal-md"
                                class="btn btn-primary font-weight-bolder text-center">
                                <i class="fas fa-plus"></i>
                                Add New
                            </a>
                            <div class="modal fade right " id="addholiday-modal-md" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-md" role="document">
                                    <div class="modal-content">
                                        <form method="POST" action="{{ route('admin.holiday.store') }}">
                                            @csrf
                                            <div class="modal-header">
                                                <h2 class="modal-title" id="exampleModalLabel">Add New Holiday</h2>
                                                <button class="close mt-modal-close" data-dismiss="modal"
                                                    type="button"><i class="fa fa-times fa-sm"></i></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Name*</label>
                                                            <input class="form-control pristine invalid touched"
                                                                placeholder="e.g EID" name="name" type="text"
                                                                autocomplete="off" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>From Date*</label>
                                                            <div class="col-lg-12 col-md-12 col-sm-12 p-0">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control"
                                                                        name="fromDate" placeholder="From Date"
                                                                        id='kt_datepicker014' autocomplete="off" required />
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text">
                                                                            <i class="far fa-calendar-alt"></i>
                                                                        </span>
                                                                    </div>

                                                                </div>
                                                                <span class="form-text text-muted">Select your
                                                                    date</span>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>To Date*</label>
                                                            <div class="col-lg-12 col-md-12 col-sm-12 p-0">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control"
                                                                        name="toDate" placeholder="To Date"
                                                                        id='kt_datepicker015' required />
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text">
                                                                            <i class="far fa-calendar-alt"></i>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <span class="form-text text-muted">Select your
                                                                    date</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary btn-payday-cancel" data-dismiss="modal"
                                                    type="button">Cancel</button>
                                                <button class="btn btn-primary" id="" type="submit">Save</button>
                                            </div>

                                        </form>
                                    </div>
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
                                    <th title="Field #1">Holiday Name</th>
                                    <th title="Field #2">From Date</th>
                                    <th title="Field #3">To Date</th>
                                    <th title="Field #4">Actions</th>
                                    <th title="Field #5"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($holidays as $item)
                                <tr>
                                    <td>{{ $item->name}}</td>
                                    <td>{{ $item->fromDate}}</td>
                                    <td>{{ $item->toDate}}</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="" id="editHolidayBtn" data-toggle="modal" data-id="{{ $item }}"
                                                data-target="#editholiday-modal-md"
                                                class="btn btn-sm btn-clean btn-icon mr-2" title="Edit details"> <span
                                                    class="svg-icon svg-icon-md"> <svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
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
                                            <a href="" id="detailHolidayBtn" data-id="{{ $item }}" data-toggle="modal"
                                                data-target="#detailholiday-modal-md"
                                                class="btn btn-sm btn-clean btn-icon mr-2" title="details">
                                                <span class="fas fa-eye"> </span>
                                            </a>
                                            <a href="" id="deleteHolidayBtn" data-id="{{ $item->id }}"
                                                class="btn btn-sm btn-clean btn-icon" title="Delete" data-toggle="modal"
                                                data-target="#deleteHoliday-modal-md">
                                                <span class="svg-icon svg-icon-md"> <svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
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
<div class="modal fade right " id="editholiday-modal-md" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <form method="POST" action="" id="editHolidayForm">
                {{ @method_field('PUT') }}
                @csrf
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLabel">Edit Holiday</h2>
                    <button class="close mt-modal-close" data-dismiss="modal" type="button"><i
                            class="fa fa-times fa-sm"></i></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Name*</label>
                                <input class="form-control pristine invalid touched" placeholder="e.g EID"
                                    name="name" id="holidayName" value="" type="text" autocomplete="off" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>From Date*</label>
                                <div class="col-lg-12 col-md-12 col-sm-12 p-0">
                                    <div class="input-group">
                                        <input type="text" class="form-control holidayFromEdit" name="fromDate"
                                            placeholder="From Date" id='kt_datepicker012' autocomplete="off"
                                            value="" required />
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="far fa-calendar-alt"></i>
                                            </span>
                                        </div>

                                    </div>
                                    <span class="form-text text-muted">Select your date</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>To Date*</label>
                                <div class="col-lg-12 col-md-12 col-sm-12 p-0">
                                    <div class="input-group">
                                        <input type="text" class="form-control holidayToEdit" name="toDate"
                                            placeholder="To Date" id='kt_datepicker013' value="" required/>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="far fa-calendar-alt"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <span class="form-text text-muted">Select your date</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary btn-payday-cancel" data-dismiss="modal"
                        type="button">Cancel</button>
                    <button class="btn btn-primary" id="" type="submit"><i class="fas fa-save"></i> Update</button>
                </div>

            </form>
        </div>
    </div>
</div>


{{-- for details --}}


<div class="modal fade right " id="detailholiday-modal-md" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLabel">Holiday Details</h2>
                <button class="close mt-modal-close" data-dismiss="modal" type="button"><i
                        class="fa fa-times fa-sm"></i></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Name*</label>
                            <input class="form-control pristine" id="holidayDetailName"type="text" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>From Date*</label>
                            <div class="col-lg-12 col-md-12 col-sm-12 p-0">
                                <div class="input-group">
                                    <input type="text" class="form-control" id='holdayFromDetail' disabled />
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="far fa-calendar-alt"></i>
                                        </span>
                                    </div>

                                </div>
                                <span class="form-text text-muted">Select your date</span>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>To Date*</label>
                            <div class="col-lg-12 col-md-12 col-sm-12 p-0">
                                <div class="input-group">
                                    <input type="text" class="form-control" id='holidayTodetail' disabled />
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="far fa-calendar-alt"></i>
                                        </span>
                                    </div>
                                </div>
                                <span class="form-text text-muted">Select your date</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary btn-payday-cancel" data-dismiss="modal"
                    type="button">Cancel
                </button>
            </div>
        </div>
    </div>
</div>

{{-- for delete --}}

<form novalidate="" method="POST" action="" class="pristine invalid touched" id="DeleteholidayBtn">
    {{ @method_field('DELETE') }}
    @csrf
    <div class="modal fade" id="deleteHoliday-modal-md" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="grid-heading text-color-skyblue font-weight-400 no-padding">Delete Shift</h3>
                    <button class="close mt-modal-close" data-dismiss="modal" type="button"><i
                            class="fa fa-times fa-sm"></i></button>
                </div>
                <div class="modal-body">
                    <div>Are you sure you want to delete this item ?</div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary btn-payday-cancel" data-dismiss="modal"
                        type="button">Cancel</button>
                    <button class="btn btn-danger" id="" type="submit">Confirm</button>
                </div>
            </div>
        </div>
    </div>
</form>



@endsection

@push('js')


<script>

        

    //for edit
    $('div').on('click', '#editHolidayBtn', function (event) {
        event.preventDefault();
        var holidays = $(this).data('id');

        $('#holidayName').val(holidays.name);
        $('.holidayFromEdit').val(holidays.fromDate);
        $('.holidayToEdit').val(holidays.toDate);


        $("#editHolidayForm").attr("action", "holiday/" + holidays.id);
    });

    // for detail
    $('div').on('click', '#detailHolidayBtn', function (event) {
        event.preventDefault();
        var holidays = $(this).data('id');

        $('#holidayDetailName').val(holidays.name);
        $('#holdayFromDetail').val(holidays.fromDate);
        $('#holidayTodetail').val(holidays.toDate);

    });

    // for delete
    $('div').on('click', '#deleteHolidayBtn', function (event) {
        event.preventDefault();
        var id = $(this).data('id');
        $("#DeleteholidayBtn").attr("action", "holiday/" + id);
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
        $('#kt_datatable').DataTable({

        });
    }

</script>
@endpush
    