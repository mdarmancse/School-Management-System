@extends('layout.app')
@section('content')

    <div id="layoutSidenav_content">

        <div class="container-fluid">
            <ol class="breadcrumb mt-4">
                <li class="breadcrumb-item active">Class {{$editData['0']['class_name']['name']}}</li>
            </ol>

            <div class="row">
                <div id="mainDiv" class="col-md-12 p-5">
                    <a href="{{url('setups/assignsubject/assignsubjectView')}}" ><span class=" btn btn-sm btn-danger"><i class="fas fa-list"></i> Assign Marks</span></a>


                    <table id="DataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>

                            <th class="th-sm">Sl.</th>
                            <th class="th-sm">Subject</th>
                            <th class="th-sm">Full Mark</th>
                            <th class="th-sm">Pass Mark</th>
                            <th class="th-sm">Get Mark</th>

                        </tr>
                        </thead>
                        <tbody id="table">

                        @foreach($editData as $key=>$data)
                            <tr>
                                <th class="th-sm">{{$key+1}}</th>

                                <th class="th-sm">{{$data['student_subject']['subject']}}</th>
                                <th class="th-sm blue-text">{{$data->full_mark}}</th>
                                <th class="th-sm red-text">{{$data->pass_mark}}</th>
                                <th class="th-sm green-text">{{$data->get_mark}}</th>

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
