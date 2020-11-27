@extends('admin.layouts.master')

@section('title','Attendance')

@section('breadcrumb')
    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.attendance.index')}}" class="text-muted">Attendance</a>
        </li>
    </ul>
@endsection

@push('css')
{{-- <link href="{{ asset('https://app.paypeople.pk/assets/app/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset('https://app.paypeople.pk/assets/app/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset('https://app.paypeople.pk/assets/app/css/fonts.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset('https://fonts.googleapis.com/css?family=Tajawal:400,700,800,900&display=swap')}}" rel="stylesheet" type="text/css" /> --}}




@endpush

@section('content')
   <div class="py-6">
    <div class="col-md-12">
        <div class="card card-primary card-outline">
            <div class="card-header" style="padding: 0%">
                <div class="card card-custom">
                    <div class="card-header flex-wrap border-0 pt-6 pb-0">
                        <div class="card-title">
                            <h3 class="card-label">Attendances
                                <span class="d-block text-muted pt-2 font-size-sm">Employee Attendances</span></h3>
                        </div>
                        <div class="card-toolbar m-2">
                            <a href="{{ route('admin.attendance.index') }}" class="btn btn-primary font-weight-bolder text-center m-2">
                                <i class="fas fa-plus"></i>
                                Add Attendance
                            </a>
                            <a href="{{ route('admin.holiday.index') }}" class="btn btn-primary font-weight-bolder text-center">
                                <i class="fas fa-plus"></i>
                                Add Holidays
                            </a>
                            <!--end::Button-->
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="card card-custom ">       
                            <div class="card-body pt-7 ">

                                <div class="col-sm-9 col-lg-12" style="text-align: end">
                                    <span class="AttendIconDetail" >
                                        <span class="AttendIcon" style="margin-left: 25px">
                                            Early-Out
                                            <img src="{{ asset('media/icons/EarlyOut.png') }}" style="width: 20px">
                                            
                                        </span>
                                        <span class="AttendIcon" style="margin-left: 25px">
                                            Lateness
                                            <img src="{{ asset('media/icons/LateNess.png') }}" style="width: 20px">
                                        </span>
                                        <span class="AttendIcon" style="margin-left: 25px" >
                                            Public Holiday
                                            <img src="{{ asset('media/icons/calande_icon.png') }}" style="width: 20px">
                                        </span>
                                        <span class="AttendIcon" style="margin-left: 25px">
                                            Present
                                            <img src="{{ asset('media/icons/present.png') }}" style="width: 20px">
                                        </span>
                                        <span class="AttendIcon" style="margin-left: 25px">
                                            Absent
                                            <img src="{{ asset('media/icons/absent.png') }}" style="width: 20px">
                                        </span>
                                        <span class="AttendIcon" style="margin-left: 25px">
                                            On Leave
                                            <img src="{{ asset('media/icons/onleave.png') }}" style="width: 20px">
                                        </span>
                                    </span>
                                </div>
                                {{-- <div   id="kt_calendar"></div> --}}

                                {{-- New code --}}


                                {{-- New Code End --}}
                            </div>
                        </div>
                        
                    </div>
                   
                </div>
            </div>
        </div>
        
        
    </div>
   </div>
   

 
@endsection

@push('js')
<script src="{{ asset('js/pages/custom/education/student/calendar.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>



<script>


</script>
@endpush
