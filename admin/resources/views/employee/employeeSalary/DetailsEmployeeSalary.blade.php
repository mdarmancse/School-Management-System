@extends('layout.app')
@section('content')


    <div id="layoutSidenav_content">

        <div class="container-fluid">
            <ol class="breadcrumb mt-4">
                <li class="breadcrumb-item active">Employee Salary Log</li>
            </ol>
            <a href="{{url('employee/reg/view')}}" > <span class=" btn btn-sm btn-danger mt-4"><i class="fas fa-list"></i> Employee List</span></a>

                <div class="row mt-5">


                    <div id="mainDiv" class="col-md-12">
                        <strong>Employee Name: {{$details->name}}</strong><br/>
                        <strong>Id No:: {{$details->id_no}}</strong><br/>
                        <table id="DataTable" class="table table-striped table-bordered mt-4" cellspacing="0" width="100%">
                            <thead>
                            <tr>

                                <th class="th-sm">Sl.</th>
                                <th class="th-sm">Previous Salary</th>
                                <th class="th-sm">Increment Salary</th>
                                <th class="th-sm">Present Salary</th>
                                <th class="th-sm">Effected Date</th>

                            </tr>
                            </thead>
                            <tbody id="table">

                            @foreach($salary_log as $key=>$salary_log)
                                <tr>
                                    @if($key=='0')
                                        <th class="text-center" colspan="5"><strong>Joining Salary: {{$salary_log->previous_salary}} Tk</strong></th>
                                    @else
                                    <th width="6%" class="th-sm">{{$key+1}}</th>

                                    <th class="th-sm">{{$salary_log->previous_salary}} Tk</th>
                                    <th class="th-sm">{{$salary_log->increment_salary}} Tk</th>
                                    <th class="th-sm">{{$salary_log->present_salary}} Tk</th>
                                    <th class="th-sm">{{date('d-m-y',strtotime($salary_log->join_date ))}}</th>
                                        @endif

                                </tr>
                            @endforeach

                            </tbody>
                        </table>

                    </div>

                </div>

        </div>
    </div>


@endsection


@section('script')


    <script type="text/javascript">



    </script>

@endsection
