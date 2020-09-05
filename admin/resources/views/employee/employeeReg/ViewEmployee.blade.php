@extends('layout.app')
@section('content')


    <div id="layoutSidenav_content">

        <div class="container-fluid">
            <ol class="breadcrumb mt-4">
                <li class="breadcrumb-item active">Employee List</li>
            </ol>
            <a href="{{url('employee/reg/employeeAdd')}}" > <span class=" btn btn-sm btn-danger mt-4"><i class="fas fa-plus"></i> Add Employee</span></a>
            <form action="{{url('students/student/yearClassWise')}}" method="GET">
                <div class="row mt-5">


                    <div id="mainDiv" class="col-md-12">

                            <table id="DataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>

                                    <th class="th-sm">Sl.</th>
                                    <th class="th-sm">Name</th>
                                    <th class="th-sm">Mobile:</th>
                                    <th class="th-sm">Email:</th>
                                    <th class="th-sm">Address</th>
                                    <th class="th-sm">Gender</th>
                                    <th class="th-sm">Join Date</th>
                                    <th class="th-sm">Salary</th>
                                    <th class="th-sm">Code</th>
                                    <th class="th-sm">Edit</th>
{{--                                    <th class="th-sm">Promotion</th>--}}
                                    <th class="th-sm">Details</th>



                                    <th class="th-sm">Delete</th>
                                </tr>
                                </thead>
                                <tbody id="table">

                                @foreach($allData as $key=>$allData)
                                    <tr>
                                        <th width="6%" class="th-sm">{{$key+1}}</th>

                                        <th class="th-sm">{{$allData->name}}</th>
                                        <th class="th-sm">{{$allData->mobile}}</th>
                                        <th class="th-sm">{{$allData->email}}</th>
                                        <th class="th-sm">{{$allData->address}}</th>
                                        <th class="th-sm">{{$allData->gender}}</th>
                                        <th class="th-sm">{{date('d-m-y',strtotime($allData->join_date ))}}</th>
                                        <th class="th-sm">{{$allData->salary}}</th>
                                        <th class="th-sm">{{$allData->code}}</th>


                                        <th class="th-sm"><a href="{{route('employee_edit',$allData->id)}}" ><i class="fas fa-edit"></i></a></th>
{{--                                        <th class="th-sm"><a href="{{route('student_promotion',$allData->student_id)}}" ><i class="fa fa-arrow-circle-up"></i></a></th>--}}
                                        <th class="th-sm"><a target="_blank" href="{{route('employee_details',$allData->id)}}" ><i class="fas fa-eye"></i></a></th>

                                        <th class="th-sm"><a href="" ><i class="fas fa-trash-alt"></i></a></th>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>

                    </div>

                </div>
            </form>
        </div>
    </div>


@endsection


@section('script')


    <script type="text/javascript">



    </script>

@endsection
