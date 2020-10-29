@extends('admin.layouts.master')

@section('title','Edit Departments')
    
@push('css')

@endpush

@section('content')
<div class="col-md-12">
    <div class="card card-custom example example-compact">
        <div class="card-header">
            <h3 class="card-title">Edit Department</h3>
            <div class="top-right mt-4">
                    
                <a href="{{ route('admin.department.index') }}"><button type="submit" class="btn btn-secondary">Back</button></a>
                <a href="{{ route('admin.department.store') }}"><button type="submit" class="btn btn-success">Save</button></a>
            </div>
        </div>
        <!--begin::Form-->
        <form class="form" method="POST" action="">
            <div class="form-group row mt-3 justify-content-center">
                <label class="col-form-label text-right col-lg-2">Departments <span class="text-danger">*</span></label>
                <div class="col-lg-3">
                    <select class="form-control" id="kt_select2_1" name="department_id">
                        <option value="">Select</option>
                    </select>
                    <span class="form-text text-muted">Please select an department.</span>
                </div> 
        </form>
        <!--end::Form-->
    </div>
</div>
@endsection

@push('js')
<script>
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

