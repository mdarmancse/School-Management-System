@extends('layout.app')
@section('content')


    <div id="layoutSidenav_content">

        <div class="container-fluid">
            <ol class="breadcrumb mt-4">
                <li class="breadcrumb-item active">Registration Fee</li>
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

            <div class="card-body">
                <div id="DocumentResult">
                    <script id="document_template" type="text/x-handlebars-template">
                    <table class="table-sm table-bordered table-striped" style="width: 100%">
                        <thead>
                        <tr>
                            @{{{thsource}}}
                        </tr>
                        </thead>
                        <tbody>
                        @{{#each this}}
                        <tr>
                        @{{{tdsource}}}
                        </tr>
                        @{{/each}}
                        </tbody>


                    </table>

                    </script>


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
                url:"/students/regFee/getStudent",
                type:"GET",
                data:{'year_id':year_id,'class_id':class_id},
                beforeSend:function () {

                },

                success:function (data) {
                    var source=$('#document_template').html();
                    var template=Handlebars.compile(source);
                    var html=template(data);
                    $('#DocumentResult').html(html);
                    $('[data-toggle="tooltip"]').tooltip();

                }
            })

        })




    </script>






@endsection
