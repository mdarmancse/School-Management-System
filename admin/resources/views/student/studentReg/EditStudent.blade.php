@extends('layout.app')
@section('content')
    <div id="layoutSidenav_content">



       <div class="card-header">

           <h3>GSgh</h3>

       </div>
        <div id="" class="container mt-4">

            <form action="" id="myForm" method="POST">@csrf

                <div class="add_item">

                    <div class="form-row">

                        <div class="form-group col-md-4">
                            <label for="">Student Name:</label>

                            <input type="text" name="name" id="nameId" class="form-control validate">

                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Father Name:</label>

                            <input type="text" name="fatherName" id="fnameId" class="form-control validate">

                        </div>

                        <div class="form-group col-md-4">
                            <label for="">Mother Name:</label>

                            <input type="text" name="motherName" id="examTypeId" class="form-control validate">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Mobile No:</label>

                            <input type="number" name="mobile" id="examTypeId" class="form-control validate">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Address:</label>

                            <input type="text" name="address" id="examTypeId" class="form-control validate">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Email:</label>

                            <input type="email" name="email" id="examTypeId" class="form-control validate">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Gender:</label>

                            <select id="genderId"  name="gender" class="form-control">
                                <option>Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Religion:</label>

                            <select id="religionId"  name="religion" class="form-control">
                                <option>Select Religion</option>
                                <option value="Islam">Islam</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="">Date of Birth:</label>

                            <input type="date" name="dob" id="examTypeId" class="form-control validate">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="">Discount:</label>

                            <input type="number" name="discount" id="examTypeId" class="form-control validate">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="">Year:</label>

                            <select id="yearId"  name="year_id" class="form-control">
                                <option>Select Year</option>
                                @foreach($year as $year)
                                    <option value="{{$year->id}}">{{$year->year}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Class:</label>

                            <select id="classId" name="class_id"  class="form-control">
                                <option>Select Class</option>
                                @foreach($classes as $classes)
                                    <option value="{{$classes->id}}">{{$classes->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Group:</label>

                            <select id="RoleId" name="group_id" class="form-control">
                                <option>Select Group</option>
                                @foreach($group as $group)
                                    <option value="{{$group->id}}">{{$group->group}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Shift:</label>

                            <select id="RoleId" name="shift_id" class="form-control">
                                <option>Select Shift</option>
                                @foreach($shift as $shift)
                                    <option value="{{$shift->id}}">{{$shift->shift}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="">Image:</label>

                            <input type="file" name="image" id="image" class="form-control validate">
                        </div>

                        <div class="form-group col-md-4">

                            <img id="showImg" src="{{asset('images/noimg.png')}}" style="width: 100px;height: 100px;border-radius: 10px;border:1px solid black">

                        </div>


                    </div>


                </div>
                <hr/>

                <button class="btn btn-blue-grey btn-sm" type="submit" form="myForm" value="Submit">Update</button>

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

