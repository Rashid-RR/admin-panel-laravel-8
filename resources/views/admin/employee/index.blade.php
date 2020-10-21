@extends('admin.layouts.master')

@section('title','Employees')
    
@push('css')

@endpush

@section('content')
    <div class="col-md-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <div class="card card-custom">
                    <div class="card-header flex-wrap border-0 pt-6 pb-0">
                        <div class="card-title">
                            <h3 class="card-label">HTML Table
                            <span class="d-block text-muted pt-2 font-size-sm">Datatable initialized from HTML table</span></h3>
                        </div>
                        <div class="card-toolbar">
                            <!--begin::Dropdown-->
                            <div class="dropdown dropdown-inline mr-2">
                                <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="svg-icon svg-icon-md">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Design/PenAndRuller.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3" />
                                            <path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>Export</button>
                                <!--begin::Dropdown Menu-->
                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                    <!--begin::Navigation-->
                                    <ul class="navi flex-column navi-hover py-2">
                                        <li class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">Choose an option:</li>
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
                                                    <i class="la la-copy"></i>
                                                </span>
                                                <span class="navi-text">Copy</span>
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
                                        <li class="navi-item">
                                            <a href="#" class="navi-link">
                                                <span class="navi-icon">
                                                    <i class="la la-file-pdf-o"></i>
                                                </span>
                                                <span class="navi-text">PDF</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <!--end::Navigation-->
                                </div>
                                <!--end::Dropdown Menu-->
                            </div>
                            <!--end::Dropdown-->
                            <!--begin::Button-->
                            <a href="#" class="btn btn-primary font-weight-bolder">
                            <span class="svg-icon svg-icon-md">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <circle fill="#000000" cx="9" cy="15" r="6" />
                                        <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>New Record</a>
                            <!--end::Button-->
                        </div>
                    </div>
                    <div class="card-body">
                        <!--begin: Search Form-->
                        <!--begin::Search Form-->
                        <div class="mb-7">
                            <div class="row align-items-center">
                                <div class="col-lg-9 col-xl-8">
                                    <div class="row align-items-center">
                                        <div class="col-md-4 my-2 my-md-0">
                                            <div class="input-icon">
                                                <input type="text" class="form-control" placeholder="Search..." id="kt_datatable_search_query" />
                                                <span>
                                                    <i class="flaticon2-search-1 text-muted"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 my-2 my-md-0">
                                            <div class="d-flex align-items-center">
                                                <label class="mr-3 mb-0 d-none d-md-block">Status:</label>
                                                <select class="form-control" id="kt_datatable_search_status">
                                                    <option value="">All</option>
                                                    <option value="1">Pending</option>
                                                    <option value="2">Delivered</option>
                                                    <option value="3">Canceled</option>
                                                    <option value="4">Success</option>
                                                    <option value="5">Info</option>
                                                    <option value="6">Danger</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 my-2 my-md-0">
                                            <div class="d-flex align-items-center">
                                                <label class="mr-3 mb-0 d-none d-md-block">Type:</label>
                                                <select class="form-control" id="kt_datatable_search_type">
                                                    <option value="">All</option>
                                                    <option value="1">Online</option>
                                                    <option value="2">Retail</option>
                                                    <option value="3">Direct</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-xl-4 mt-5 mt-lg-0">
                                    <a href="#" class="btn btn-light-primary px-6 font-weight-bold">Search</a>
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
                                <tr>
                                    <td>0006-3629</td>
                                    <td>Land Rover</td>
                                    <td>Range Rover</td>
                                    <td>Orange</td>
                                    <td>$22672.60</td>
                                    <td>2016-11-28</td>
                                    <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="" type="button" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                        <a href="" type="button" class="btn btn-info btn-sm"><i class="fas fa-calendar-week"></i></a>
                                        <a href="" type="button" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                                    </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!--end: Datatable-->
                    </div>
                </div>
            </div>
          </div>
    </div>
@endsection

@push('js')
    <script>
        "use strict";
// Class definition

var KTDatatableHtmlTableDemo = function() {
    // Private functions

    // demo initializer
    var demo = function() {

		var datatable = $('#kt_datatable').KTDatatable({
			data: {
				saveState: {cookie: false},
			},
			search: {
				input: $('#kt_datatable_search_query'),
				key: 'generalSearch'
			},
			columns: [
				{
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
					template: function(row) {
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
						return '<span class="label font-weight-bold label-lg' + status[row.Status].class + ' label-inline">' + status[row.Status].title + '</span>';
					},
				}, {
					field: 'Type',
					title: 'Type',
					autoHide: false,
					// callback function support for column rendering
					template: function(row) {
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
						return '<span class="label label-' + status[row.Type].state + ' label-dot mr-2"></span><span class="font-weight-bold text-' +status[row.Type].state + '">' +	status[row.Type].title + '</span>';
					},
				},
			],
		});



        $('#kt_datatable_search_status').on('change', function() {
            datatable.search($(this).val().toLowerCase(), 'Status');
        });

        $('#kt_datatable_search_type').on('change', function() {
            datatable.search($(this).val().toLowerCase(), 'Type');
        });

        $('#kt_datatable_search_status, #kt_datatable_search_type').selectpicker();

    };

    return {
        // Public functions
        init: function() {
            // init dmeo
            demo();
        },
    };
}();

jQuery(document).ready(function() {
	KTDatatableHtmlTableDemo.init();
});

    </script>
@endpush