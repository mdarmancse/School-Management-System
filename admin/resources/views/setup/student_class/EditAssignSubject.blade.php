@extends('layout.app')
@section('content')
    <div id="layoutSidenav_content">



        <div id="" class="container mt-4">
            <form action="{{route('fee_update',$editData[0]->fee_category_id)}}" id="myForm" method="POST">@csrf

                <div class="add_item">
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label for="">Fee Category</label>

                            <select name="fee_category_id" id="fee_category_id" class="custom-select custom-select-sm">

                                <option selected>Select Fee Category</option>
                                @foreach($fee_categories as $category)
                                    <option value="{{$category->id}}" {{($editData['0']->fee_category_id==$category->id)?"selected":""}}>{{$category->feeCat}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                        @foreach($editData as $editData)
                        <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label for="">Class</label>
                            <select id="class_id" name="class_id[]" class="custom-select custom-select-sm">
                                <option selected>Select Class</option>
                                @foreach($classes as $class)
                                    <option value="{{$class->id}}" {{($editData->class_id==$class->id)?"selected":""}}>{{$class->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="md-form ml-3 col-md-4">
                            <input type="number" id="amount" value="{{$editData->amount}}" name="amount[]" class="form-control">
                            <label for="form1">Amount</label>
                        </div>
                        <div class="md-form">
                            <span class="btn btn-success btn-sm AddEventMore" style="border-radius: 50%"><i class="fa fa-plus-circle"></i></span>
                            <span class="btn btn-danger btn-sm RemoveEventMore" style="border-radius: 50%"><i class="fa fa-minus-circle"></i></span>
                        </div>

                    </div>
                        </div>
                            @endforeach

                </div>
                <hr/>

                <button class="btn btn-warning btn-sm" type="submit" form="myForm" value="Submit">Update</button>

            </form>



        </div>


        <!---------------------------------ZEROX COPY -------------------------------------------- -->

        <div style="visibility: hidden">
            <div class="whole_extra_item_add" id="whole_extra_item_add">
                <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
                    <div class="form-row">

                        <div class="form-group col-md-5">
                            <label for="">Class</label>
                            <select name="class_id[]" class="custom-select custom-select-sm">
                                <option selected>Select Class</option>
                                @foreach($classes as $class)
                                    <option value="{{$class->id}}">{{$class->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="md-form ml-3 col-md-4">
                            <input type="number" id="" name="amount[]" class="form-control">
                            <label for="form1">Amount</label>
                        </div>

                        <div class="md-form">
                            <span class="btn btn-success btn-sm AddEventMore" style="border-radius: 50%"><i class="fa fa-plus-circle"></i></span>
                            <span class="btn btn-danger btn-sm RemoveEventMore" style="border-radius: 50%"><i class="fa fa-minus-circle"></i></span>
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

        })



    </script>

@endsection
