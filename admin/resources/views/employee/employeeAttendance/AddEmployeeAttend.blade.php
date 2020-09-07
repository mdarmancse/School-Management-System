@extends('layout.app')
@section('content')
    <link href="{{asset('css/attend.css')}}" rel="stylesheet" >
    <style type="text/css">
.switch-toggle{
    width: auto;
}.switch-toggle label:not(.disabled){
   cursor: pointer;
}.switch-candy a{
border: 1px solid #333333;
    border-radius: 3px;
    box-shadow: 0 1px 1px rgba(0,0,0,0.2),inset 0 1px 1px rgba(255,255,255,0.45);
    background-color: white;
    background-image: -webkit-linear-gradient(top,rgba(255,255,255,0.2),transparent);
    background-image: linear-gradient(to bottom,rgba(255,255,255,0.2),transparent);
  }
.switch-toggle.switch-candy,.switch-light.switch-candy>span{
background-color: #c3c9c7;
    border-radius: 3px;
    box-shadow: 0 1px 0 rgba(0,0,0,0.2),inset 0 2px 6px rgba(255,255,255,0.2);
}

    </style>

    <div id="layoutSidenav_content">

        <div id="" class="container mt-4">

            <ol class="breadcrumb mt-4">
                <li class="breadcrumb-item active">
                    @if(isset($editData))
                        Edit Employee Attendance
                    @else
                        Add Employee Attendance
                    @endif

                </li>
            </ol>


            <a href="{{url('employee/attend/view')}}" > <span class=" btn btn-sm btn-danger mt-4"><i class="fas fa-list"></i> Employee Attendance List</span></a>

            <form action="{{route('employee_attend_insert')}}" id="myForm" method="POST">@csrf

                @csrf
                @if(isset($editData))

                <div class="add_item mt-4">


                    <div class="form-row">

                        <div class="form-group col-md-4">
                            <label for="">Attendance Date:</label>
                            <input type="date" name="date" value="{{$editData['0']['date']}}" class="form-control datetime"  autocomplete="off" readonly>
                        </div>
                        <table class="table-sm table-striped table-bordered dt-responsive" width="100%">
                            <thead>
                            <tr>
                                <th rowspan="2" class="text-center" style="vertical-align: middle">Sl.</th>
                                <th rowspan="2" class="text-center" style="vertical-align: middle">Employee Name</th>
                                <th colspan="3" class="text-center" style="vertical-align: middle;width: 25%">Attendance Status.</th>
                            </tr>
                            <tr>
                                <th  class="text-center btn present_all" style="display: table-cell;background-color: darkseagreen;color: white;font-weight: bold">Present</th>
                                <th  class="text-center btn leave_all" style="display: table-cell;background-color: #c40033 ;color: white;font-weight: bold">Leave</th>
                                <th class="text-center btn absent_all" style="display: table-cell;background-color: sandybrown;color: white;font-weight: bold">Absent</th>
                            </tr>

                            </thead>
                            <tbody>
                            @foreach($editData as $key=>$editData)
                                <tr id="div{{$editData->id}}" class="text-center">
                                    <input type="hidden" name="employee_id[]" value="{{$editData->employee_id}}"  class="employee_id" >
                                    <td>{{$key+1}}</td>
                                    <td>{{$editData['user']['name']}}</td>
                                    <td colspan="3">
                                        <div class="switch-toggle switch-3 switch-candy">
                                            <input  type="radio" name="attend_status{{$key}}" value="Present" id="present{{$key}}" class="present"
                                            {{($editData->attend_status=='Present')?'checked':''}}/>
                                            <label for="present{{$key}}">Present</label>

                                            <input  type="radio" name="attend_status{{$key}}" value="Leave" id="leave{{$key}}" class="leave"
                                                {{($editData->attend_status=='Leave')?'checked':''}}/>
                                            <label for="leave{{$key}}">Leave</label>

                                            <input  type="radio" name="attend_status{{$key}}" value="Absent" id="absent{{$key}}" class="absent"
                                                {{($editData->attend_status=='Absent')?'checked':''}}/>
                                            <label for="absent{{$key}}">Absent</label>
                                        </div>


                                    </td>

                                </tr>



                            @endforeach

                            </tbody>
                        </table>





                    </div>


                </div>
                @else
                    <div class="add_item mt-4">


                        <div class="form-row">

                            <div class="form-group col-md-4">
                                <label for="">Attendance Date:</label>
                                <input type="date" name="date" value="" class="form-control datetime"  autocomplete="off" readonly>
                            </div>
                            <table class="table-sm table-striped table-bordered dt-responsive" width="100%">
                                <thead>
                                <tr>
                                    <th rowspan="2" class="text-center" style="vertical-align: middle">Sl.</th>
                                    <th rowspan="2" class="text-center" style="vertical-align: middle">Employee Name</th>
                                    <th colspan="3" class="text-center" style="vertical-align: middle;width: 25%">Attendance Status.</th>
                                </tr>
                                <tr>
                                    <th  class="text-center btn present_all" style="display: table-cell;background-color: darkseagreen;color: white;font-weight: bold">Present</th>
                                    <th  class="text-center btn leave_all" style="display: table-cell;background-color: #c40033 ;color: white;font-weight: bold">Leave</th>
                                    <th class="text-center btn absent_all" style="display: table-cell;background-color: sandybrown;color: white;font-weight: bold">Absent</th>
                                </tr>

                                </thead>
                                <tbody>
                                @foreach($employee as $key=>$employee)
                                    <tr id="div{{$employee->id}}" class="text-center">
                                        <input type="hidden" name="employee_id[]" value="{{$employee->id}}"  class="employee_id" >
                                        <td>{{$key+1}}</td>
                                        <td>{{$employee->name}}</td>
                                        <td colspan="3">
                                            <div class="switch-toggle switch-3 switch-candy">
                                                <input  type="radio" name="attend_status{{$key}}" value="Present" id="present{{$key}}" class="present" checked="checked" />
                                                <label for="present{{$key}}">Present</label>

                                                <input  type="radio" name="attend_status{{$key}}" value="Leave" id="leave{{$key}}" class="leave"/>
                                                <label for="leave{{$key}}">Leave</label>

                                                <input  type="radio" name="attend_status{{$key}}" value="Absent" id="absent{{$key}}" class="absent" />
                                                <label for="absent{{$key}}">Absent</label>
                                            </div>


                                        </td>

                                    </tr>



                                @endforeach

                                </tbody>
                            </table>





                        </div>


                    </div>
                @endif
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

            <script type="text/javascript">
                $(document).on('click','.present',function () {
                    $(this).parents('tr').find('.datetime').css('pointer-events','none').css('background-color','#dee2e6').css('color','#495057');
                });

                $(document).on('click','.leave',function () {
                    $(this).parents('tr').find('.datetime').css('pointer-events','').css('background-color','white').css('color','#495057');
                });


                $(document).on('click','.absent',function () {
                    $(this).parents('tr').find('.datetime').css('pointer-events','none').css('background-color','#dee2e6').css('color','#dee2e6');
                });


            </script>
            <script type="text/javascript">

                $(document).on('click','.present_all',function () {
                    $("input[value=Present]").prop('checked',true);
                    $('.datetime').css('pointer-events','none').css('background-color','#dee2e6').css('color','#495057');
                });
                $(document).on('click','.leave_all',function () {
                    $("input[value=Leave]").prop('checked',true);
                    $('.datetime').css('pointer-events','none').css('background-color','#dee2e6').css('color','#495057');
                });
                $(document).on('click','.absent_all',function () {
                    $("input[value=Absent]").prop('checked',true);
                    $('.datetime').css('pointer-events','none').css('background-color','#dee2e6').css('color','#495057');
                });



            </script>

@endsection
