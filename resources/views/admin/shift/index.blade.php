@extends('admin.layouts.master')

@section('title','Shifts')

@section('breadcrumb')
<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
    <li class="breadcrumb-item">
        <a href="{{ route('admin.shift.index') }}" class="text-muted">Shift</a>
    </li>
</ul>
@endsection

@push('css')

@endpush

@section('content')
    <div class="col-md-12 py-6">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <div class="card card-custom">
                    <div class="card-header flex-wrap border-0 pt-6 pb-0">
                        <div class="card-title">
                            <h3 class="card-label">Shift
                                <span class="d-block text-muted pt-2 font-size-sm">All Shifts</span></h3>
                        </div>
                        <div class="card-toolbar">
                            <a href="" data-toggle="modal" data-target="#addnew-modal-lg"
                                class="btn btn-primary font-weight-bolder text-center">
                                <i class="fas fa-plus"></i>
                                Add New
                            </a>
                            <div class="modal fade" id="addnew-modal-lg" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <form method="POST" action="{{ route('admin.shift.store') }}">
                                            @csrf
                                            <div class="modal-header">
                                                <h2 class="modal-title" id="exampleModalLabel">Add Shift</h2>
                                                <button class="close mt-modal-close" data-dismiss="modal" type="button"><i
                                                        class="fa fa-times fa-sm"></i></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group row">
                                                    <label class="col-xl-4 col-lg-4 col-form-label">Shift Name</label>
                                                    <div class="col-lg-12 col-xl-12">
                                                        <input type="text" class="form-control" id="formGroupExampleInput"
                                                            name="name" required>
                                                    </div>
                                                </div>
                                                <hr>
                                                <h5>Attendance Setting</h5><br>
                                                <label class="col-lg-2 col-form-label" style="padding: 0">Working
                                                    Hour</label>
                                                <div class="col-lg-6" style="padding: 0">
                                                    <input type="text" class="form-control" name="workingHours" required />
                                                </div>
                                                <div class="form-row mt-3">
                                                    <div class="form-group col-md-6">
                                                        <label for="example-time-input">Start Time* (e.g. 09:00
                                                            AM)</label>
                                                        <input class="form-control" type="time" value="--:-- --"
                                                            id="example-time-input" name="startTime" />
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="example-time-input">End Time* (e.g. 09:00
                                                            PM)</label>
                                                        <input class="form-control" type="time" name="endTime"
                                                            value="--:-- --" id="example-time-input" />
                                                    </div>

                                                </div>
                                                <div class="form-group mt-1">
                                                    <h5>Working Days</h5>
                                                    <div class="checkbox-inline mt-4">
                                                        <label class="checkbox">
                                                            <input type="checkbox" name="monday" value="1" />
                                                            <span></span>Monday</label>
                                                        <label class="checkbox">
                                                            <input type="checkbox" name="tuesday" value="1" />
                                                            <span></span>Tuesday</label>
                                                        <label class="checkbox">
                                                            <input type="checkbox" name="wednesday" value="1" />
                                                            <span></span>Wednesday</label>
                                                        <label class="checkbox">
                                                            <input type="checkbox" name="thursday" value="1" />
                                                            <span></span>Thursday</label>
                                                        <label class="checkbox">
                                                            <input type="checkbox" name="friday" value="1" />
                                                            <span></span>Friday</label>
                                                        <label class="checkbox">
                                                            <input type="checkbox" name="saturday" value="1" />
                                                            <span></span>Satuday</label>
                                                        <label class="checkbox">
                                                            <input type="checkbox" name="sunday" value="1" />
                                                            <span></span>Sunday</label>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </form>
                                    </div>
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
                        <!--begin: Datatable-->
                        <table class="datatable datatable-bordered datatable-head-custom" id="kt_datatable">
                            <thead>
                                <tr>
                                    <th title="Field #1">Name</th>
                                    <th title="Field #2">Working Hours</th>
                                    <th title="Field #3">Start Time</th>
                                    <th title="Field #4">End Time</th>
                                    <th title="Field #6">Actions</th>
                                    <th title="Field #7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($shifts as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->workingHours }}</td>
                                        <td>{{ $item->startTime }} AM</td>
                                        <td>{{ $item->endTime }} PM</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">

                                                <a href="" id="shiftEditBtn" data-id="{{ $item }}" data-toggle="modal"
                                                    data-target="#edit-modal-lg" class="btn btn-sm btn-clean btn-icon mr-2"
                                                    title="Edit details"> <span class="svg-icon svg-icon-md"> <svg
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
                                                
                                                <a href="" id="shiftDeltailBtn" data-id="{{ $item }}" data-toggle="modal" data-target="#detail-modal-lg" class="btn btn-sm btn-clean btn-icon mr-2" title="details">
                                                    <span class="fas fa-eye"></span> 
                                                </a>

                                                

                                                <a href="" id="shiftDeleteBtn" data-id="{{ $item->id }}" class="btn btn-sm btn-clean btn-icon" title="Delete" data-toggle="modal" data-target="#deleteShift-modal-lg">
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
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Popup modal --}}

    {{-- for edit --}}
    <div class="modal fade" id="edit-modal-lg" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="" method="POST" class="pristine invalid touched" id="shiftEditData">
                    {{ @method_field('PUT') }}
                    @csrf
                    <div class="modal-header">
                        <h2 class="modal-title" id="exampleModalLabel">Edit
                            Shift</h2>
                        <button class="close mt-modal-close"
                            data-dismiss="modal" type="button"><i
                                class="fa fa-times fa-sm"></i></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label
                                class="col-xl-4 col-lg-4 col-form-label">Shift
                                Name</label>
                            <div class="col-lg-12 col-xl-12">
                                <input type="text"
                                    class="form-control shiftName"
                                    id="formGroupExampleInput" name="name"
                                    value="" required>
                            </div>
                        </div>
                        <h5>Attendance Setting</h5><br>
                        <label class="col-lg-2 col-form-label">Working
                            Hour</label>
                        <div class="col-lg-6" style="padding: 0">
                            <input type="text" name="workingHours" value="" class="form-control workingHours"
                                required />
                        </div>
                        <div class="form-row mt-3">
                            <div class="form-group col-md-6">
                                <label for="example-time-input">Start
                                    Time* (e.g. 09:00 AM)</label>
                                <input class="form-control startTime" type="time" value="" name="startTime"
                                    id="example-time-input" required/>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="example-time-input">End
                                    Time* (e.g. 09:00 PM)</label>
                                <input class="form-control endTime" type="time" value="" name="endTime"
                                    id="example-time-input" required/>
                            </div>
                        </div>
                        <div class="form-group mt-1">
                            <h5>Working Days</h5>
                            <div class="checkbox-inline mt-4">
                                <label class="checkbox">
                                    <input type="checkbox" name="monday" value="1" class="monday" />
                                    <span></span>Monday</label>
                                <label class="checkbox">
                                    <input type="checkbox" name="tuesday" value="1"
                                        class="tuesday" />
                                    <span></span>Tuesday</label>
                                <label class="checkbox">
                                    <input type="checkbox" name="wednesday" value="1"
                                        class="wednesday" />
                                    <span></span>Wednesday</label>
                                <label class="checkbox">
                                    <input type="checkbox" name="thursday" value="1"
                                        class="thursday" />
                                    <span></span>Thursday</label>
                                <label class="checkbox">
                                    <input type="checkbox" name="friday" value="1"
                                        class="friday" />
                                    <span></span>Friday</label>
                                <label class="checkbox">
                                    <input type="checkbox" name="saturday" value="1"
                                        class="saturday" />
                                    <span></span>Satuday</label>
                                <label class="checkbox">
                                    <input type="checkbox" name="sunday" value="1"
                                        class="sunday" />
                                    <span></span>Sunday</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary"><i
                                class="fas fa-save"></i>Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- for detail --}}
    <div class="modal fade" id="detail-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLabel">
                        Shift Details</h2>
                    <button class="close mt-modal-close" data-dismiss="modal" type="button"><i
                            class="fa fa-times fa-sm"></i></button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-xl-4 col-lg-4 col-form-label">Shift
                            Name</label>
                        <div class="col-lg-12 col-xl-12">
                            <input type="text" class="form-control shiftName2" id="formGroupExampleInput"
                                value="" disabled required>
                        </div>

                    </div>
                    <hr>
                    <h5>Attendance Setting</h5><br>
                    <label class="col-lg-2 col-form-label">Working
                        Hour</label>
                    <div class="col-lg-6" style="padding: 0">
                        <input type="text" value="" class="form-control workingHours2"
                            required disabled />
                    </div>
                    <div class="form-row mt-3">
                        <div class="form-group col-md-6">
                            <label for="example-time-input">Start
                                Time* (e.g. 09:00 AM)</label>
                            <input class="form-control startTime2" type="time" value=""
                                id="example-time-input" disabled />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="example-time-input">End
                                Time* (e.g. 09:00 PM)</label>
                            <input class="form-control endTime2" type="time" value=""
                                id="example-time-input" disabled />
                        </div>

                    </div>
                    <div class="form-group mt-1">
                        <h5>Working Days</h5>
                        <div class="checkbox-inline mt-4">
                            <label class="checkbox">
                                <input type="checkbox" value="1" class="monday2" disabled />
                                <span></span>Monday</label>
                            <label class="checkbox">
                                <input type="checkbox" value="1" class="tuesday2" disabled />
                                <span></span>Tuesday</label>
                            <label class="checkbox">
                                <input type="checkbox" value="1" class="wednesday2" disabled />
                                <span></span>Wednesday</label>
                            <label class="checkbox">
                                <input type="checkbox" value="1" class="thursday2" disabled />
                                <span></span>Thursday</label>
                            <label class="checkbox">
                                <input type="checkbox" value="1" class="friday2" disabled />
                                <span></span>Friday</label>
                            <label class="checkbox">
                                <input type="checkbox" value="1" class="saturday2" disabled />
                                <span></span>Satuday</label>
                            <label class="checkbox">
                                <input type="checkbox" value="1" class="sunday2" disabled />
                                <span></span>Sunday</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    {{-- for delete --}}
    <form novalidate="" method="POST" action="" class="pristine invalid touched" id="shiftDeleteData">
        {{ @method_field('DELETE') }}
        @csrf
        <div class="modal fade" id="deleteShift-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        //for Edit operation perform
        //var companyTypes =    {!! json_encode($shifts->toArray()) !!};

        $('div').on('click', '#shiftEditBtn', function (event) {
            event.preventDefault();
            var shift = $(this).data('id');
            $('.shiftName').val(shift.name);
            $('.workingHours').val(shift.workingHours);
            $('.startTime').val(shift.startTime);
            $('.endTime').val(shift.endTime);
            if (shift.monday == 1) {
                $('.monday').attr("checked", true);
            }else{
                $('.monday').attr("checked", false);
            }
            if (shift.tuesday == 1) {
                $('.tuesday').attr("checked", true);
            }else{
                $('.tuesday').attr("checked", false);
            }
            if (shift.wednesday == 1) {
                $('.wednesday').attr("checked", true);
            }else{
                $('.wednesday').attr("checked", false);
            }
            if (shift.thursday == 1) {
                $('.thursday').attr("checked", true);
            }else{
                $('.thursday').attr("checked", false);
            }
            if (shift.friday == 1) {
                $('.friday').attr("checked", true);
            }else{
                $('.friday').attr("checked", false);
            }
            if (shift.saturday == 1) {
                $('.saturday').attr("checked", true);
            }else{
                $('.saturday').attr("checked", false);
            }
            if (shift.sunday == 1) {
                $('.sunday').attr("checked", true);
            }else{
                $('.sunday').attr("checked", false);
            }
            $("#shiftEditData").attr("action", "shift/" + shift.id);
        });
        //for delete operation perform
        $('div').on('click', '#shiftDeleteBtn', function (event) {
            event.preventDefault();
            var id = $(this).data('id');
            $("#shiftDeleteData").attr("action", "shift/" + id);
        });
        //for detail operation perform
        $('div').on('click', '#shiftDeltailBtn', function (event) {
            event.preventDefault();
            var shift = $(this).data('id');
            $('.shiftName2').val(shift.name);
            $('.workingHours2').val(shift.workingHours);
            $('.startTime2').val(shift.startTime);
            $('.endTime2').val(shift.endTime);
            if (shift.monday == 1) {
                $('.monday2').attr("checked", true);
            }else{
                $('.monday2').attr("checked", false);
            }
            if (shift.tuesday == 1) {
                $('.tuesday2').attr("checked", true);
            }else{
                $('.tuesday2').attr("checked", false);
            }
            if (shift.wednesday == 1) {
                $('.wednesday2').attr("checked", true);
            }else{
                $('.wednesday2').attr("checked", false);
            }
            if (shift.thursday == 1) {
                $('.thursday2').attr("checked", true);
            }else{
                $('.thursday2').attr("checked", false);
            }
            if (shift.friday == 1) {
                $('.friday2').attr("checked", true);
            }else{
                $('.friday2').attr("checked", false);
            }
            if (shift.saturday == 1) {
                $('.saturday2').attr("checked", true);
            }else{
                $('.saturday2').attr("checked", false);
            }
            if (shift.sunday == 1) {
                $('.sunday2').attr("checked", true);
            }else{
                $('.sunday2').attr("checked", false);
            }
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
