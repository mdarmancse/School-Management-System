@extends('layout.app')
@section('content')
<div id="layoutSidenav_content">

    <div id="" class="container mt-4">

        <ol class="breadcrumb mt-4">
            <li class="breadcrumb-item active">
                @if(isset($editData))
                Edit Student
                @else
                Add Student
                @endif

            </li>
        </ol>

        <a href="{{url('employee/reg/view')}}" > <span class=" btn btn-sm btn-danger mt-4"><i class="fas fa-list"></i> Employee List</span></a>

        <form action="{{(@$editData)?route('employee_update',$editData->id):route('employee_insert')}}" id="myForm" method="POST">@csrf

        @csrf
            <div class="add_item mt-4">

                <div class="form-row">

                    <div class="form-group col-md-4">
                        <label for="">Employee Name:</label>

                        <input type="text" name="name" value="{{@$editData->name}}" id="nameId" class="form-control validate">

                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Father Name:</label>

                        <input type="text" name="fatherName" value="{{@$editData->fatherName}}" id="fnameId" class="form-control validate">

                    </div>

                    <div class="form-group col-md-4">
                        <label for="">Mother Name:</label>

                        <input type="text" name="motherName" value="{{@$editData->motherName}}" id="examTypeId" class="form-control validate">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Mobile No:</label>

                        <input type="number" name="mobile" value="{{@$editData->mobile}}" id="examTypeId" class="form-control validate">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Email:</label>

                        <input type="email" name="email" value="{{@$editData->email}}" id="emailID" class="form-control validate">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Address:</label>

                        <input type="text" name="address" value="{{@$editData->address}}" id="addressID" class="form-control validate">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">Gender:</label>

                        <select id="genderId"  name="gender" class="form-control">
                            <option>Select Gender</option>
                            <option value="Male" {{(@$editData->gender=='Male')?'selected':''}}>Male</option>
                            <option value="Female" {{(@$editData->gender=='Female')?'selected':''}}>Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Religion:</label>

                        <select id="religionId"  name="religion" class="form-control">
                            <option>Select Religion</option>
                            <option value="Muslim" {{(@$editData->religion=='Muslim')?'selected':''}} >Muslim</option>
                            <option value="Hindu" {{(@$editData->religion=='Hindu')?'selected':''}}>Hindu</option>
                            <option value="Other" {{(@$editData->religion=='Other')?'selected':''}}>Other</option>
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">Date of Birth:</label>

                        <input type="date" name="dob" value="{{@$editData->dob}}" id="examTypeId" class="form-control validate">
                    </div>



                    <div class="form-group col-md-4">
                        <label for="">Designation:</label>

                        <select id="desId"  name="designation" class="form-control">
                            <option>Select Designation</option>
                            @foreach($designation as $designation)
                            <option value="{{$designation->id}}" {{(@$editData->designation_id==$designation->id)?'selected':""}}>{{$designation->designation}}</option>
                            @endforeach
                        </select>
                    </div>
                    @if(!@$editData)
                    <div class="form-group col-md-4">
                        <label for="">Join Date:</label>

                        <input type="date" name="join_date" value="{{@$editData->join_date}}" id="join_dateID" class="form-control validate">
                    </div>


                    <div class="form-group col-md-4">
                        <label for="">Salary:</label>

                        <input type="number" name="salary" value="{{@$editData->salary}}" id="salaryID" class="form-control validate">
                    </div>
                    @endif

                    <div class="form-group col-md-4">
                        <label for="">Image:</label>

                        <input type="file" name="image"  id="image" class="form-control validate">
                    </div>

                    <div class="form-group col-md-4">

                        <img id="showImg" src="{{!empty($editData->image)?url('public/students_images/'.$editData['student']['image']):url('public/images/noimg.png')}}" style="width: 100px;height: 100px;border-radius: 10px;border:1px solid black">

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
