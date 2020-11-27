@extends('admin.layouts.master')

@section('title','Leaves')

@section('breadcrumb')
    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.leave.index')}}" class="text-muted">Leave</a>
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
                                <h3 class="card-label">Leaves
                                    <span class="d-block text-muted pt-2 font-size-sm">All leaves</span></h3>
                            </div>
                            <div class="card-toolbar">
                                <!--begin::Dropdown-->
                                <div class="dropdown dropdown-inline mr-2">
                                </div>
                                <a href="" data-toggle="modal" data-target="#add-leave-modal-lg" class="btn btn-primary font-weight-bolder text-center">
                                    <i class="fas fa-plus"></i>
                                    Add New
                                </a>
                                <div class="modal fade" id="add-leave-modal-lg" role="dialog" style="display: none;">
                                    <div class="modal-dialog modal-md">
                                        <form novalidate="" class="pristine invalid touched" action="{{ route('admin.designation.store') }}" method="POST">
                                            @csrf
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="grid-heading text-color-skyblue font-weight-400 no-padding">Add Leave</h3>
                                                    <button class="close mt-modal-close" data-dismiss="modal" type="button"><i class="fa fa-times fa-sm"></i></button>
                                                </div>
                                                <div class="modal-body">
                                                   <div class="row">
                                                       <div class="col-md-5 col-lg-5">
                                                            <div class="form-group">
                                                                <label>Employee<span class="text-danger">*</span></label>
                                                                <select class="form-control" id="kt_select2_111122334457899" name="type">
                                                                    
                                                                    {{-- @foreach ($designations as $item)
                                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                                    @endforeach --}}
                                                                </select>
                                                                <span class="form-text text-muted">Please select an Employee</span>
                                                            </div>
                                                       </div>
                                                       <div class="col-md-5 col-lg-5">
                                                            <div class="form-group">
                                                                <label>Category<span class="text-danger">*</span></label>
                                                                <select class="form-control" id="kt_select2_111122334457810" name="Category">
                                                                    <option value="" selected disabled>Select</option>
                                                                    <option value="1">Sick</option>
                                                                    <option value="2">Vacation(Paid)</option>
                                                                    
                                                                    {{-- @foreach ($designations as $item)
                                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                                    @endforeach --}}
                                                                </select>
                                                                <span class="form-text text-muted">Please select an Category</span>
                                                            </div>
                                                            
                                                       </div>
                                                       <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label>Hours<span class="text-danger">*</span></label>
                                                                <input type="number" class="form-control" name="hours" placeholder=""  autocomplete="off" readonly/>

                                                                <span class="form-text text-muted"></span>
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
                                                                            id='kt_datepicker0155' autocomplete="off" required />
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
                                                                            id='kt_datepicker0166' required />
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
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Balance</label>
                                                                <input type="number" class="form-control" name="balance" placeholder=""  autocomplete="off" readonly/>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>action</label>
                                                                <div class="col-lg-12 col-md-12 col-sm-12 p-0">
                                                                    <div class="radio-inline">
                                                                        <label class="radio">
                                                                        <input type="radio" name="radios2" />
                                                                        <span></span>Option 1</label>
                                                                        <label class="radio">
                                                                        <input type="radio" name="radios2" />
                                                                        <span></span>Option 2</label>
                                                                        <label class="radio">
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary btn-payday-cancel" data-dismiss="modal" type="button">Cancel</button>
                                                    <button class="btn btn-primary" id="" type="submit">Save</button>
                                                    <!---->
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
                                        
                                        <th title="Field #1">Name</th>
                                        <th title="Field #2">Category</th>
                                        <th title="Field #3">Leave Type</th>
                                        <th title="Field #4">Hours</th>
                                        <th title="Field #5">Balance</th>
                                        <th title="Field #5">Duration</th>
                                        <th title="Field #5">Actions</th>
                                        

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($Leaves as $item)
                                    <tr>
                                        
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            <div class="btn-group mr-1 " role="group" aria-label="Basic example" >

                                                <a href="" id="edit-leave-modal-lg" data-id="{{ $item }}" data-toggle="modal" data-target="#edit-desg-modal-lg"
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
                                                <a href="" id="designationDetailBtn" data-id="{{ $item }}" data-toggle="modal" data-target="#detail-desg-modal-lg"
                                                     class="btn btn-sm btn-clean btn-icon mr-2"> 
                                                     <span class="fas fa-eye"></span> 
                                                </a>
                                                
                                                <a href="" id="detail-leave-modal-lg" data-id="{{ $item->id }}" class="btn btn-sm btn-clean btn-icon" title="Delete" data-toggle="modal" data-target="#deleteDesignation-modal-lg">
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

    {{-- Modal popups --}}

    {{-- for edit --}}
    <div class="modal fade" id="edit-leave-modal-lg" role="dialog" style="display: none;">
        <div class="modal-dialog modal-md">
            <form novalidate="" class="pristine invalid touched" action="{{ route('admin.designation.store') }}" method="POST">
                @csrf
                    {{ @method_field('PUT') }}
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="grid-heading text-color-skyblue font-weight-400 no-padding">Add Leave</h3>
                        <button class="close mt-modal-close" data-dismiss="modal" type="button"><i class="fa fa-times fa-sm"></i></button>
                    </div>
                    <div class="modal-body">
                       <div class="row">
                           <div class="col-md-5 col-lg-5">
                                <div class="form-group">
                                    <label>Employee<span class="text-danger">*</span></label>
                                    <select class="form-control" id="kt_select2_111122334457899" name="employee_id" required>
                                        
                                        {{-- @foreach ($designations as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach --}}
                                    </select>
                                    <span class="form-text text-muted">Please select an Employee</span>
                                </div>
                           </div>
                           <div class="col-md-5 col-lg-5">
                                <div class="form-group">
                                    <label>Category<span class="text-danger">*</span></label>
                                    <select class="form-control" id="kt_select2_111122334457810" name="Category">
                                        <option value="" selected disabled>Select</option>
                                        <option value="1">Sick</option>
                                        <option value="2">Vacation(Paid)</option>
                                        
                                        {{-- @foreach ($designations as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach --}}
                                    </select>
                                    <span class="form-text text-muted">Please select an Category</span>
                                </div>
                                
                           </div>
                           <div class="col-md-2">
                                <div class="form-group">
                                    <label>Hours<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="hours" placeholder=""  autocomplete="off" readonly/>

                                    <span class="form-text text-muted"></span>
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
                                                id='kt_datepicker0155' autocomplete="off" required />
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
                                                id='kt_datepicker0166' required />
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
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Balance</label>
                                    <input type="number" class="form-control" name="balance" placeholder=""  autocomplete="off" readonly/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>action</label>
                                    <div class="col-lg-12 col-md-12 col-sm-12 p-0">
                                        <div class="radio-inline">
                                            <label class="radio">
                                            <input type="radio" name="radios2" />
                                            <span></span>Option 1</label>
                                            <label class="radio">
                                            <input type="radio" name="radios2" />
                                            <span></span>Option 2</label>
                                            <label class="radio">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary btn-payday-cancel" data-dismiss="modal" type="button">Cancel</button>
                        <button class="btn btn-primary" id="" type="submit">Save</button>
                        <!---->
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- for detail --}}
    <div class="modal fade" id="detail-leave-modal-lg" role="dialog" style="display: none;">
        <div class="modal-dialog modal-md">
            <form novalidate="" class="pristine invalid touched" action="{{ route('admin.designation.store') }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="grid-heading text-color-skyblue font-weight-400 no-padding">Add Leave</h3>
                        <button class="close mt-modal-close" data-dismiss="modal" type="button"><i class="fa fa-times fa-sm"></i></button>
                    </div>
                    <div class="modal-body">
                       <div class="row">
                           <div class="col-md-5 col-lg-5">
                                <div class="form-group">
                                    <label>Employee<span class="text-danger">*</span></label>
                                    <select class="form-control" id="kt_select2_111122334457899" name="type">
                                        
                                        {{-- @foreach ($designations as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach --}}
                                    </select>
                                    <span class="form-text text-muted">Please select an Employee</span>
                                </div>
                           </div>
                           <div class="col-md-5 col-lg-5">
                                <div class="form-group">
                                    <label>Category<span class="text-danger">*</span></label>
                                    <select class="form-control" id="kt_select2_111122334457810" name="Category">
                                        <option value="" selected disabled>Select</option>
                                        <option value="1">Sick</option>
                                        <option value="2">Vacation(Paid)</option>
                                        
                                        {{-- @foreach ($designations as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach --}}
                                    </select>
                                    <span class="form-text text-muted">Please select an Category</span>
                                </div>
                                
                           </div>
                           <div class="col-md-2">
                                <div class="form-group">
                                    <label>Hours<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="hours" placeholder=""  autocomplete="off" readonly/>

                                    <span class="form-text text-muted"></span>
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
                                                id='kt_datepicker0155' autocomplete="off" required />
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
                                                id='kt_datepicker0166' required />
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
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Balance</label>
                                    <input type="number" class="form-control" name="balance" placeholder=""  autocomplete="off" readonly/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>action</label>
                                    <div class="col-lg-12 col-md-12 col-sm-12 p-0">
                                        <div class="radio-inline">
                                            <label class="radio">
                                            <input type="radio" name="radios2" />
                                            <span></span>Option 1</label>
                                            <label class="radio">
                                            <input type="radio" name="radios2" />
                                            <span></span>Option 2</label>
                                            <label class="radio">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary btn-payday-cancel" data-dismiss="modal" type="button">Cancel</button>
                        <button class="btn btn-primary" id="" type="submit">Save</button>
                        <!---->
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- for delete --}}
    <form novalidate="" method="POST" action="" class="pristine invalid touched" id="deletaLeave">
        {{ @method_field('DELETE') }}
        @csrf
        <div class="modal fade" id="detail-leave-modal-lg" role="dialog" style="display: none;">
            <div class="modal-dialog modal-md">
                <form novalidate="" class="pristine invalid touched" action="{{ route('admin.designation.store') }}" method="POST">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="grid-heading text-color-skyblue font-weight-400 no-padding">Add Leave</h3>
                            <button class="close mt-modal-close" data-dismiss="modal" type="button"><i class="fa fa-times fa-sm"></i></button>
                        </div>
                        <div class="modal-body">
                           <div class="row">
                               <div class="col-md-5 col-lg-5">
                                    <div class="form-group">
                                        <label>Employee<span class="text-danger">*</span></label>
                                        <select class="form-control" id="kt_select2_111122334457899" name="type">
                                            
                                            {{-- @foreach ($designations as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach --}}
                                        </select>
                                        <span class="form-text text-muted">Please select an Employee</span>
                                    </div>
                               </div>
                               <div class="col-md-5 col-lg-5">
                                    <div class="form-group">
                                        <label>Category<span class="text-danger">*</span></label>
                                        <select class="form-control" id="kt_select2_111122334457810" name="Category">
                                            <option value="" selected disabled>Select</option>
                                            <option value="1">Sick</option>
                                            <option value="2">Vacation(Paid)</option>
                                            
                                            {{-- @foreach ($designations as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach --}}
                                        </select>
                                        <span class="form-text text-muted">Please select an Category</span>
                                    </div>
                                    
                               </div>
                               <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Hours<span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" name="hours" placeholder=""  autocomplete="off" readonly/>
        
                                        <span class="form-text text-muted"></span>
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
                                                    id='kt_datepicker0155' autocomplete="off" required />
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
                                                    id='kt_datepicker0166' required />
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
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Balance</label>
                                        <input type="number" class="form-control" name="balance" placeholder=""  autocomplete="off" readonly/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>action</label>
                                        <div class="col-lg-12 col-md-12 col-sm-12 p-0">
                                            <div class="radio-inline">
                                                <label class="radio">
                                                <input type="radio" name="radios2" />
                                                <span></span>Option 1</label>
                                                <label class="radio">
                                                <input type="radio" name="radios2" />
                                                <span></span>Option 2</label>
                                                <label class="radio">
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                </div>
        
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary btn-payday-cancel" data-dismiss="modal" type="button">Cancel</button>
                            <button class="btn btn-primary" id="" type="submit">Save</button>
                            <!---->
                        </div>
                    </div>
                </form>
            </div>
        </div>
       
    </form>

@endsection

@push('js')
    <script>


            $('div').on('click', '#designationEditBtn', function (event) {
                event.preventDefault();
                var designation = $(this).data('id');
                console.log(designation.deptName)
                $('#name').val(designation.name);
                $("#designationEditData").attr("action", "designation/" + designation.id);
            });
            $('div').on('click', '#designationDeleteBtn', function (event) {
                event.preventDefault();
                var id = $(this).data('id');
                $("#designationDeleteData").attr("action", "designation/" + id);
            });
            $('div').on('click', '#designationDetailBtn', function (event) {
                event.preventDefault();
                var designation = $(this).data('id');
                $('#designationName').val(designation.name);
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
