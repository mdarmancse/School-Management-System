@extends('layout.app')
@section('content')

    <div id="layoutSidenav_content">

        <div class="container-fluid">
            <ol class="breadcrumb mt-4">
                <li class="breadcrumb-item active">{{$editData['0']['fee_category']['feeCat']}}</li>
            </ol>

            <div class="row">
                <div id="mainDiv" class="col-md-12 p-5">
                    <a href="{{url('setups/amount/amountView')}}" ><span class=" btn btn-sm btn-danger"><i class="fas fa-list"></i> Fee Amount List</span></a>


                    <table id="DataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>

                            <th class="th-sm">Sl.</th>
                            <th class="th-sm">Class</th>
                            <th class="th-sm">Amount</th>

                        </tr>
                        </thead>
                        <tbody id="table">

                        @foreach($editData as $key=>$data)
                            <tr>
                                <th class="th-sm">{{$key+1}}</th>

                                <th class="th-sm">{{$data['student_class']['name']}}</th>
                                <th class="th-sm">{{$data->amount}}</th>

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
