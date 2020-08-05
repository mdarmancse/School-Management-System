@extends('layout.app')
@section('content')
    <div id="layoutSidenav_content">



        <div id="" class="container mt-4">
            <form action="{{url('setups/assignsubject/insertData')}}" id="myForm" method="POST">@csrf

                <div class="add_item">
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="">Classes</label>

                            <select name="class_id" id="class_id" class="custom-select custom-select-sm">

                                <option selected>Select Class</option>
                                @foreach($classes as $classes)
                                    <option value="{{$classes->id}}">{{$classes->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="">Subjects</label>
                            <select id="subject_id" name="subject_id[]" class="custom-select custom-select-sm">
                                <option selected>Select Subject</option>
                                @foreach($subjects as $subjects)
                                    <option value="{{$subjects->id}}">{{$subjects->subject}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="md-form ml-3 col-md-2">
                            <input type="number" id="full_mark"  name="full_mark[]" class="form-control">
                            <label for="form1">Full Mark</label>
                        </div>
                        <div class="md-form ml-3 col-md-2">
                            <input type="number" id="pass_mark"  name="pass_mark[]" class="form-control">
                            <label for="form1">Pass Mark</label>
                        </div>
                        <div class="md-form ml-3 col-md-2">
                            <input type="number" id="get_mark"  name="get_mark[]" class="form-control">
                            <label for="form1">Get Mark</label>
                        </div>
                        <div class="md-form ml-2 col-md-1">
                            <span class="btn btn-success btn-sm addEventMore" style="border-radius: 50%"><i class="fa fa-plus-circle"></i></span>
                        </div>
                    </div>
                </div>
                <hr/>
                    <button class="btn btn-blue-grey btn-sm" type="submit" form="myForm" value="Submit">Submit</button>

            </form>





        </div>


        <!---------------------------------ZEROX COPY -------------------------------------------- -->

        <div style="visibility: hidden">
            <div class="whole_extra_item_add" id="whole_extra_item_add">
                <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">

                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="">Subjects</label>
                            <select id="subject_id" name="subject_id[]" class="custom-select custom-select-sm">
                                <option selected>Select Subject</option>
                                @foreach($subjects as $subjects)
                                    <option value="{{$subjects->id}}">{{$subjects->subject}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="md-form ml-3 col-md-2">
                            <input type="number" id="full_mark"  name="full_mark[]" class="form-control">
                            <label for="form1">Full Mark</label>
                        </div>
                        <div class="md-form ml-3 col-md-2">
                            <input type="number" id="pass_mark"  name="pass_mark[]" class="form-control">
                            <label for="form1">Pass Mark</label>
                        </div>
                        <div class="md-form ml-3 col-md-2">
                            <input type="number" id="get_mark"  name="get_mark[]" class="form-control">
                            <label for="form1">Get Mark</label>
                        </div>
                        <div class="md-form ml-3 col-md-2">
                            <span class="btn btn-success btn-sm AddEventMore" style="border-radius: 50%"><i class="fa fa-plus-circle"></i></span>
                            <span class="btn btn-danger btn-sm RemoveEventMore" style="border-radius: 50%"><i class="fa fa-minus-circle"></i></span>
                        </div>
                    </div>






                    </div>
                </div>
            </div>

        </div>



        <!------------------------------------ZEROX COPY END ----------------------------------------- -->

    </div>








{{--            <!-----Loader--->--}}


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
                                    "class_id":{
                                        required:true
                                    },
                                    "subject_id[]":{
                                        required:true
                                    },
                                    "pass_mark[]":{
                                        required:true
                                    },"full_mark[]":{
                                        required:true
                                    },"get_mark[]":{
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

                    })



                </script>

@endsection
