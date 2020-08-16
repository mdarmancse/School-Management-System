@extends('layout.app')
@section('content')


    <div id="layoutSidenav_content">

        <div id="MessageShowDiv" style="height: 20px">
            <div id="message" class="btn-danger text-center" >
                <?php

                use Illuminate\Support\Facades\Session;
                echo  Session::get('success');

                ?>
            </div>
        </div>


        <div class="container-fluid">
            <ol class="breadcrumb mt-4">
                <li class="breadcrumb-item active">Roll Generate</li>
            </ol>


                <div class="row mt-5">

                    <div class="form-group col-md-3">
                        <label for="">Year:</label>

                        <select id="year_id"  class="form-control">
                            <option>Select Year</option>
                            @foreach($year as $year)
                                <option value="{{$year->id}}">{{$year->year}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">Class:</label>

                        <select id="class_id" name="class_id"  class="form-control">
                            <option>Select Class</option>
                            @foreach($classes as $cls)
                                <option value="{{$cls->id}}">{{$cls->name}}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="form-group col-md-2 pt-4">
                        <a id="search" class="btn btn-warning btn-sm" name="search"><i class="fas fa-search"></i> Search</a>
                    </div>



                </div>
            <div class="">
            <form action="{{route('roll_insert')}}" method="POST" id="myForm">
                @csrf

                <div class="form-row">
                    <div>

                    </div>

                    <div class="row d-none col-md-12" id="rollGenerate">
                        <div class="col-md-12">
                            <table class="table table-bordered table-striped dt-responsive" style="width: 100%">
                                <thead>
                                <tr>
                                    <th>ID No:</th>
                                    <th>Student Name:</th>
                                    <th>Father Name:</th>
                                    <th>Gender:</th>
                                    <th>Roll No:</th>
                                </tr>

                                </thead>
                                <tbody id="rollGenerate_tr">

                                </tbody>
                            </table>


                        </div>
                    </div>

                </div>
                <button type="submit" form="myForm" class="btn btn-sm btn-success">Roll Generate</button>
            </form>
            </div>
        </div>
    </div>


@endsection


@section('script')


    <script type="text/javascript">
        $(document).on('click','#search',function () {
            var year_id=$('#year_id').val();
            var class_id=$('#class_id').val();
            $('.notifyjs-corner').html();
            if(year_id==''){
                $.notify('Year Required',{globalPosition:'top right',className:'error'});
                return false;
            }
            else if(class_id==''){
                $.notify('Class Required',{globalPosition:'top right',className:'error'});
                return false;

            }
            $.ajax({
                  url:"/students/roll/getStudent",
                   type:"GET",
                    data:{'year_id':year_id,'class_id':class_id},
                    success:function (data) {
                        $('#rollGenerate').removeClass('d-none');
                        var html='';

                        $.each(data, function(key,v) {
                           html +=
                               "<tr>"+
                                "<td>" + v.student.id_no + " <input type='hidden' name='student_id[]' value='"+v.student.id_no+"'> </td>" +
                                "<td>" + v.student.name + "</td>" +
                                "<td>" + v.student.fatherName + "</td>" +
                                "<td>" + v.student.gender + "</td>" +
                               "<td><input type='text' class='form-control form-control-sm' name='roll[]' value='"+v.roll+"'> </td>"+
                               "</tr>"

                        });
                        html=$('#rollGenerate_tr').html(html);

                    }
            })

        })

        // getStudentData();
        // function getStudentData() {
        //     axios.get('/students/roll/getStudent')
        //         .then(function(response) {
        //
        //             if (response.status == 200) {
        //                 var year_id=('#year_id').val();
        //                    var class_id=('#class_id').val();
        //
        //                 $('#rollGenerate').removeClass('d-none');
        //
        //                 var jsonData = response.data;
        //
        //                 $.each(jsonData, function(i,v) {
        //                     $('<tr>').html(
        //
        //                         "<td>" + jsonData[i].id_no + " <input type='hidden' name='student_id[]' value='"+jsonData[i].id_no+"'> </td>" +
        //                                                "<td>" + jsonData[i].name + "</td>" +
        //                                               "<td>" + jsonData[i].fatherName + "</td>" +
        //                                                "<td><input type='text' class='form-control form-control-sm' name='roll[]' value='"+jsonData[i].roll+"'> </td>"
        //
        //                     ).appendTo('#rollGenerate_tr');
        //                 });
        //
        //
        //
        //             } else {
        //
        //                 toastr.error('Something Went Wrong');
        //
        //             }
        //
        //
        //         })
        //         .catch(function(error) {
        //             toastr.error('Failed');
        //         })
        //
        //
        // }



    </script>

    <script>

//        $(function ($) {
//
//            $("#message").fadeOut(500);
//            $("#message").fadeIn(500);
//
//            $("#message").fadeOut(500);
//            $("#message").fadeIn(500);
//
//            $("#message").fadeOut(500);
//            $("#message").fadeIn(500);
//            $("").fadeOut(500);
//
//        });

        $("#message").notify("Hello Box");



    </script>




@endsection
