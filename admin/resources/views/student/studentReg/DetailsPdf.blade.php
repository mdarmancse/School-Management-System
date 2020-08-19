<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <style>

        .container{
            margin: 0 auto;
        }
        .col-md-12{
            width: 100%;
        }
        .text-center{
            text-align: center;

            margin-left: 3rem;
        }
        .row{

        }
        .image{

            width: 100px;
            height: 100px;

        }
        .mt{
            margin-top: 1rem;
        }
        .sign{
            text-align: center;
        }



    </style>


</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <table width="100%">
                <tr>
                    {{--                <td width="33%" class="text-center"><img src="{{asset('images/laravel.jpg')}}"--}}
                    {{--                                                         style="width: 100px;height: 100px"></td>--}}
                    <td class="text-center">
                        <h4><strong>ABC SCHOOL</strong></h4>
                        <h5>Hathazari,Chittagong</h5>
                        <h6>Mobile:01787281564</h6>
                    </td>
                    {{--                    <td width="33%" class="text-center">--}}
                    {{--                        --}}{{--                    <img src="{{asset('uploads/students_images/'.$details['student']['image'])}}" class="image" />--}}

                    {{--                        --}}{{--                    <img src="{{asset('public/images/laravel.jpg')}}">--}}


                    {{--                    </td>--}}
                </tr>
            </table>
        </div>

        <div class="col-md-12 text-center mt">
            <h5 style="font-weight: bold;padding: -25px;"> Student Registration Card</h5>
            <hr style="border: solid 1px;width: 60%;color: black;margin-bottom: 0px;"/><br/><br/>

        </div>
        <div style="clear: both;margin-top: 7%"></div>
        <div class="col-md-12">

           <table border="1" width="100%">
               <tbody>

               <tr>
                   <td style="width: 50%">Student Name:</td>
                   <td>{{$details['student']['name']}}</td>
               </tr>

               <tr>
                   <td style="width: 50%">Father Name:</td>
                   <td>{{$details['student']['fatherName']}}</td>
               </tr>
               <tr>
                   <td style="width: 50%">Mother Name:</td>
                   <td>{{$details['student']['motherName']}}</td>
               </tr>
               <tr>
                   <td style="width: 50%">Year:</td>
                   <td>{{$details['year']['year']}}</td>
               </tr>
               <tr>
                   <td style="width: 50%">Class:</td>
                   <td>{{$details['student_class']['name']}}</td>
               </tr>
               <tr>
                   <td style="width: 50%">ID No:</td>
                   <td>{{$details['student']['id_no']}}</td>
               </tr>
               <tr>
                   <td style="width: 50%">Roll No:</td>
                   <td>{{$details->roll}}</td>
               </tr>
               <tr>
                   <td style="width: 50%">Mobile No:</td>
                   <td>{{$details['student']['mobile']}}</td>
               </tr>
               <tr>
                   <td style="width: 50%">Gender:</td>
                   <td>{{$details['student']['gender']}}</td>
               </tr>
               <tr>
                   <td style="width: 50%">Address:</td>
                   <td>{{$details['student']['address']}}</td>
               </tr>
               <tr>
                   <td style="width: 50%">Religion:</td>
                   <td>{{$details['student']['religion']}}</td>
               </tr>
               <tr>
                   <td style="width: 50%">Birth Day:</td>
                   <td>{{$details['student']['dob']}}</td>
               </tr>


               </tbody>


           </table>
            <i style="font-size: 1px;float: right;">Print Date:{{date("d M Y")}}</i>
        </div>
    </div>
    <br/>
    <div class="col-md-12">
        <table border="0" width="100%">
            <tbody>
            <tr>
                <td style="width: 30%"></td>
                <td style="width: 30%"></td>
                <td style="width: 40%;text-align: center;">
                    <hr style="border: solid 1px;width: 60%;color: black;margin-bottom: 0px;"/><br/>
                    <h6 class="sign">Principal/Headmaster</h6>
                </td>

            </tr>

            </tbody>
        </table>

    </div>



</div>
</body>

</html>
