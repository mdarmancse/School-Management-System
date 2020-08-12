@extends('layout.app')
@section('content')


    <div id="layoutSidenav_content">

    <div class="container-fluid">
        <ol class="breadcrumb mt-4">
            <li class="breadcrumb-item active">Fee Category Amount</li>
        </ol>
        <a href="{{url('students/student/studentAdd')}}" > <span class=" btn btn-sm btn-danger mt-4"><i class="fas fa-plus"></i> Add Student</span></a>
        <form action="{{url('students/student/yearClassWise')}}" method="GET">
        <div class="row mt-5">

            <div class="form-group col-md-3">
                <label for="">Year:</label>

                <select id="yearId"  name="year_id" class="form-control">
                    <option>Select Year</option>
                    @foreach($year as $year)
                        <option value="{{$year->id}}" {{(@$year_id==$year->id)?"selected":""}}>{{$year->year}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="">Class:</label>

                <select id="classId" name="class_id"  class="form-control">
                    <option>Select Class</option>
                    @foreach($classes as $cls)
                        <option value="{{$cls->id}}" {{(@$class_id==$cls->id)?"selected":""}}>{{$cls->name}}</option>
                    @endforeach
                </select>

            </div>
            <div class="form-group col-md-2 pt-4">
                <button type="submit" class="btn btn-warning btn-sm" name="search"><i class="fas fa-search"></i> Search</button>
            </div>

            <div id="mainDiv" class="col-md-12">

                    @if(!@$search)
                <table id="DataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>

                        <th class="th-sm">Sl.</th>
                        <th class="th-sm">Name</th>
                        <th class="th-sm">ID NO.</th>
                        <th class="th-sm">Roll</th>
                        <th class="th-sm">Year</th>
                        <th class="th-sm">Class</th>
                        <th class="th-sm">Image</th>
                        <th class="th-sm">Edit</th>
                        <th class="th-sm">Delete</th>
                    </tr>
                    </thead>
                    <tbody id="table">

                    @foreach($AllData as $key=>$AllData)
                        <tr>
                            <th width="6%" class="th-sm">{{$key+1}}</th>

                            <th class="th-sm">{{$AllData['student']['name']}}</th>
                            <th class="th-sm">{{$AllData['student']['id_no']}}</th>
                            <th class="th-sm">{{$AllData->roll}}</th>
                            <th class="th-sm">{{$AllData['student_class']['name']}}</th>
                            <th class="th-sm">{{$AllData['year']['year']}}</th>
                            <th class="th-sm"><img src="{{!empty($AllData['student']['image'])?url('public/students_images/'.$AllData['student']['image']):url('public/images/noimg.png')}}"
                                                   style="width: 70px;height: 80px"
                                /></th>
                            <th class="th-sm"><a href="{{route('student_edit',$AllData->id)}}" ><i class="fas fa-edit"></i></a></th>

                            <th class="th-sm"><a href="" ><i class="fas fa-trash-alt"></i></a></th>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                    @else
                    <table id="DataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>

                            <th class="th-sm">Sl.</th>
                            <th class="th-sm">Name</th>
                            <th class="th-sm">ID NO.</th>
                            <th class="th-sm">Roll</th>
                            <th class="th-sm">Year</th>
                            <th class="th-sm">Class</th>
                            <th class="th-sm">Image</th>
                            <th class="th-sm">Edit</th>
                            <th class="th-sm">Delete</th>
                        </tr>
                        </thead>
                        <tbody id="table">

                        @foreach($AllData as $key=>$AllData)
                            <tr>
                                <th width="6%" class="th-sm">{{$key+1}}</th>

                                <th class="th-sm">{{$AllData['student']['name']}}</th>
                                <th class="th-sm">{{$AllData['student']['id_no']}}</th>
                                <th class="th-sm">{{$AllData->roll}}</th>
                                <th class="th-sm">{{$AllData['student_class']['name']}}</th>
                                <th class="th-sm">{{$AllData['year']['year']}}</th>
                                <th class="th-sm"><img src="{{!empty($AllData['student']['image'])?url('public/students_images/'.$AllData['student']['image']):url('public/images/noimg.png')}}"
                                                       style="width: 70px;height: 80px"
                                    /></th>
                                <th class="th-sm"><a href="{{route('student_edit',$AllData->id)}}" ><i class="fas fa-edit"></i></a></th>

                                <th class="th-sm"><a href="" ><i class="fas fa-trash-alt"></i></a></th>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                        @endif
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
