@extends('layout.app')
@section('content')

    <div id="layoutSidenav_content">

        <div class="container-fluid">
            <ol class="breadcrumb mt-4">
                <li class="breadcrumb-item active">Manage Assign Subject</li>
            </ol>

            <div class="row">
                <div id="mainDiv" class="col-md-12 p-5">
                    <a href="{{url('setups/assignsubject/aassignsubjectAdd')}}" > <span class=" btn btn-sm btn-danger"><i class="fas fa-plus"></i>Assign subject</span></a>


                    <table id="DataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>

                            <th class="th-sm">Sl.</th>
                            <th class="th-sm">Classes</th>
                            <th class="th-sm">Edit</th>
                            <th class="th-sm">Details</th>
                            <th class="th-sm">Delete</th>
                        </tr>
                        </thead>
                        <tbody id="table">

                        @foreach($AllData as $key=>$AllData)
                            <tr>
                                <th class="th-sm">{{$key+1}}</th>

                                <th class="th-sm">{{$AllData['class_name']['name']}}</th>
                                <th class="th-sm"><a href="{{route('assignsubject_edit',$AllData->class_id)}}" ><i class="fas fa-edit"></i></a></th>
                                <th class="th-sm"><a href="{{route('assignsubject_edit',$AllData->class_id)}}" ><i class="fas fa-eye"></i></a></th>
                                <th class="th-sm"><a href="" ><i class="fas fa-trash-alt"></i></a></th>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>

                </div>

            </div>


            @endsection


            @section('script')


                <script type="text/javascript">



                </script>


@endsection
