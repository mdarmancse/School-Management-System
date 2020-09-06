@extends('layout.app')
@section('content')
    <div id="layoutSidenav_content">

        <div id="" class="container mt-4">

            <ol class="breadcrumb mt-4">
                <li class="breadcrumb-item active">
                    @if(isset($editData))
                        Edit Employee Leave
                    @else
                        Add Employee Leave
                    @endif

                </li>
            </ol>

            <a href="{{url('employee/leave/view')}}" > <span class=" btn btn-sm btn-danger mt-4"><i class="fas fa-list"></i> Employee Leave List</span></a>

            <form action="{{(@$editData)?route('employee_leave_update',$editData->id):route('employee_leave_insert')}}" id="myForm" method="POST">@csrf

                @csrf
                <div class="add_item mt-4">

                    <div class="form-row">


                        <div class="form-group col-md-4">
                            <label for="">Employee Name:</label>
                            <select id=""  name="employee_id" class="form-control">
                                <option>Select Employee</option>
                                @foreach($employee as $employee)
                                    <option value="{{$employee->id}}" {{(@$editData->employee_id==$employee->id)?'selected':""}}>{{$employee->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Leave Purpose:</label>
                            <select id="leave_purpose_id"  name="leave_purpose_id" class="form-control">
                                <option>Select Purpose</option>
                                @foreach($leavePurpose as $leavePurpose)
                                    <option value="{{$leavePurpose->id}}" {{(@$editData->leave_purpose_id==$leavePurpose->id)?'selected':""}}>{{$leavePurpose->name}}</option>
                                @endforeach
                                <option value="0">New Purpose</option>
                            </select>
                            <input type="text" name="name" value="" id="addPurposeID" class="form-control" placeholder="Write Purpose" style="display: none">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Start Date:</label>

                            <input type="date" name="start_date" value="{{@$editData->start_date}}" id="join_dateID" class="form-control validate" >
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">End Date:</label>

                            <input type="date" name="end_date" value="{{@$editData->end_date}}" id="join_dateID" class="form-control validate">
                        </div>



                    </div>


                </div>
                <hr/>

                <button class="btn btn-blue-grey btn-sm" type="submit" form="myForm" value="Submit">{{(@$editData)?'Update':'Submit'}}</button>
            </form>



        </div>



        @endsection


        @section('script')


            <script type="text/javascript">
                $(document).ready(function () {
                    $(document).on('change','#leave_purpose_id',function () {
                        var leave_purpose_id=$(this).val();
                        if (leave_purpose_id=='0'){
                            $('#addPurposeID').show();
                        }else{
                            $('#addPurposeID').hide();
                        }

                    })

                })
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
