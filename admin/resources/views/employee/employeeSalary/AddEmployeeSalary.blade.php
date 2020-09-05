@extends('layout.app')
@section('content')
    <div id="layoutSidenav_content">

        <div id="" class="container mt-4">

            <ol class="breadcrumb mt-4">
                <li class="breadcrumb-item active">

                        Add Employee Salary Increment


                </li>
            </ol>

            <a href="{{url('employee/salary/view')}}" > <span class=" btn btn-sm btn-danger mt-4"><i class="fas fa-list"></i> Employee List</span></a>

            <form action="{{route('employee_salary_store',$editData->id)}}" id="myForm" method="POST">@csrf

                @csrf
                <div class="add_item mt-4">

                    <div class="form-row">


                            <div class="form-group col-md-4">
                                <label for="">Salary Amount:</label>

                                <input type="number" name="increment_salary" value="" id="salaryID" class="form-control validate">
                            </div>

                        <div class="form-group col-md-4">
                            <label for="">Effected Date:</label>

                            <input type="date" name="effected_date" value="" id="join_dateID" class="form-control validate">
                        </div>
                        <div class="form-group col-md-4 mt-4">
                        <button class="btn btn-blue-grey btn-sm" type="submit" form="myForm" value="Submit"><i class="fas fa-plus"></i> Add</button>
                        </div>
                    </div>


                </div>



            </form>



        </div>



        @endsection


        @section('script')


            <script type="text/javascript">
                $(document).ready(function () {
                    // var counter=0
                    $(document).on('click','.addEventMore,.AddEventMore',function () {
                        let whole_extra_item_add=$('#whole_extra_item_add').html();
                        $(this).closest(".add_item").append(whole_extra_item_add)
                        // counter++;
                    });
                    $(document).on('click','.RemoveEventMore',function () {
                        $(this).closest("#delete_whole_extra_item_add").remove()
                        // counter-=1;

                    })
                })

            </script>

            <script type="text/javascript">

                $(document).ready(function () {

                    $('#myForm').validate({

                        rules:{
                            "fee_category_id":{
                                required:true
                            },
                            "class_id[]":{
                                required:true
                            },
                            "amount[]":{
                                required:true
                            }
                        },
                        messages:{


                        },
                        errorElement:'span',
                        errorPlacement:function (error,element) {

                            error.addClass('invalid-feedback');
                            element.closest('.form-group').append(error);
                        },
                        highlight:function (element,errorClass,validClass) {
                            $(element).addClass('is-invalid');
                        },
                        unhighlight:function (element,errorClass,validClass) {
                            $(element).removeClass('is-invalid');
                        },
                    })

                });








            </script>

@endsection
