@extends('layout.app')
@section('content')


    <div id="layoutSidenav_content">

        <div class="container-fluid">
            <ol class="breadcrumb mt-4">
                <li class="breadcrumb-item active">Employee Attendance Details </li>


            </ol>

            <a href="{{url('employee/attend/view')}}" > <span class=" btn btn-sm btn-danger mt-4"><i class="fas fa-plus"></i> Employee Attendance List</span></a>

            <div class="row mt-5">


                <div id="mainDiv" class="col-md-12">

                    <table id="DataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>


                            <th class="th-sm">Sl.</th>
                            <th class="th-sm">Employee Name</th>
                            <th class="th-sm">ID.</th>

                            <th class="th-sm">Date</th>
                            <th class="th-sm">Attend Status</th>

                        </tr>
                        </thead>
                        <tbody id="table">

                        @foreach($details as $key=>$allData)
                            <tr>
                                <th width="6%" class="th-sm">{{$key+1}}</th>

                                <th class="th-sm">{{$allData['user']['name']}}</th>
                                <th class="th-sm">{{$allData['user']['id_no']}}</th>

                                <th class="th-sm">{{date('d-m-Y',strtotime($allData->date))}}</th>
                                <th class="th-sm">{{$allData->attend_status}}</th>

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
