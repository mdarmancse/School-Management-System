@extends('layout.app')
@section('content')


    <div id="layoutSidenav_content">

        <div class="container-fluid">
            <ol class="breadcrumb mt-4">
                <li class="breadcrumb-item active">Employee Leave</li>
            </ol>
            <a href="{{url('employee/leave/employeeAdd')}}" > <span class=" btn btn-sm btn-danger mt-4"><i class="fas fa-plus"></i> Add Employee Leave</span></a>

                <div class="row mt-5">


                    <div id="mainDiv" class="col-md-12">

                        <table id="DataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>

                                <th class="th-sm">Sl.</th>
                                <th class="th-sm">Employee Name</th>
                                <th class="th-sm">ID.</th>
                                <th class="th-sm">Leave Purpose</th>
                                <th class="th-sm">Date</th>
                                <th class="th-sm">Edit</th>
                                {{--                                    <th class="th-sm">Promotion</th>--}}
{{--                                <th class="th-sm">Details</th>--}}



                                <th class="th-sm">Delete</th>
                            </tr>
                            </thead>
                            <tbody id="table">

                            @foreach($allData as $key=>$allData)
                                <tr>
                                    <th width="6%" class="th-sm">{{$key+1}}</th>

                                    <th class="th-sm">{{$allData['user']['name']}}</th>
                                    <th class="th-sm">{{$allData['user']['id_no']}}</th>
                                    <th class="th-sm">{{$allData['purpose']['name']}}</th>
                                    <th class="th-sm">{{date('d-m-Y',strtotime($allData->start_date))}} to {{date('d-m-Y',strtotime($allData->end_date))}}</th>



                                    <th class="th-sm"><a href="{{route('employee_leave_edit',$allData->id)}}" ><i class="fas fa-edit"></i></a></th>
                                    {{--                                        <th class="th-sm"><a href="{{route('student_promotion',$allData->student_id)}}" ><i class="fa fa-arrow-circle-up"></i></a></th>--}}
{{--                                    <th class="th-sm"><a target="_blank" href="{{route('employee_details',$allData->id)}}" ><i class="fas fa-eye"></i></a></th>--}}

                                    <th class="th-sm"><a href="" ><i class="fas fa-trash-alt"></i></a></th>
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
