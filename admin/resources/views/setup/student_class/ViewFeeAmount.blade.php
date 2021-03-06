@extends('layout.app')
@section('content')

    <div id="layoutSidenav_content">

        <div class="container-fluid">
            <ol class="breadcrumb mt-4">
                <li class="breadcrumb-item active">Fee Category Amount</li>
            </ol>

            <div class="row">
                <div id="mainDiv" class="col-md-12 p-5">
                    <a href="{{url('setups/amount/amountAdd')}}" > <span class=" btn btn-sm btn-danger"><i class="fas fa-plus"></i> Add Fee Amount</span></a>


                    <table id="DataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>

                            <th class="th-sm">Sl.</th>
                            <th class="th-sm">Fee Category</th>
                            <th class="th-sm">Edit</th>
                            <th class="th-sm">Details</th>
                            <th class="th-sm">Delete</th>
                        </tr>
                        </thead>
                        <tbody id="table">

                        @foreach($AmountData as $key=>$AmountData)
                        <tr>
                            <th class="th-sm">{{$key+1}}</th>

                            <th class="th-sm">{{$AmountData['fee_category']['feeCat']}}</th>
                            <th class="th-sm"><a href="{{route('fee_edit',$AmountData->fee_category_id)}}" ><i class="fas fa-edit"></i></a></th>
                            <th class="th-sm"><a href="{{route('fee_details',$AmountData->fee_category_id)}}" ><i class="fas fa-eye"></i></a></th>
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
