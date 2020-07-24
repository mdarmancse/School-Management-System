@extends('layout.app')
@section('content')

    <div id="layoutSidenav_content">

        <div class="container-fluid">
            <ol class="breadcrumb mt-4">
                <li class="breadcrumb-item active">Fee Category Amount</li>
            </ol>

            <div class="row">
                <div id="mainDiv" class="col-md-12 p-5 d-none">
                    <button id="addNew" type="button" class=" btn btn-sm btn-danger">Add Fee Category Amount</button>


                    <table id="DataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th class="th-sm">Sl.</th>
                            <th class="th-sm">Fee Category</th>
                            <th class="th-sm">Class</th>
                            <th class="th-sm">Amount</th>
                            <th class="th-sm">Edit</th>
                            <th class="th-sm">Delete</th>
                        </tr>
                        </thead>
                        <tbody id="table">


                        </tbody>
                    </table>

                </div>

            </div>

            <!-----Loader--->

            <div id="loaderDiv" class="container">
                <div class="row">
                    <div class="col-md-12 text-center p-5">
                        <img class="loading-icon m-5" src="{{asset('images/loader.svg')}}">
                    </div>
                </div>
            </div>

            <!-----Went Wrong--->
            <div id="WrongDiv" class="container d-none">
                <div class="row">
                    <div class="col-md-12 text-center p-5">
                        <h3>Something Went Wrong !</h3>
                    </div>
                </div>
            </div>

            <!-----Delete Modal--->
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-body p-3 text-center">
                            <h5 class="mt-4">Do You Want To Delete?</h5>
                            <h5 id="DeleteId" class="mt-4 d-none"> </h5>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">No</button>
                            <button id="DeleteConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Yes</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-----Edit Modal--->

            <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">

                        <div class="modal-body mx-3">

                            <h5>Want to Update??</h5>

                            <p id="EditId" class="mt-4 d-none"></p>

                            <div id="EditForm" class="d-none">



                                <input type="text" id="feeCatId" class="form-control validate" placeholder="Fee Category">
                                <input type="text" id="feeClsId" class="form-control validate" placeholder="Class">
                                <input type="text" id="feeAmId" class="form-control validate" placeholder="Amount">


                            </div>
                            <div class="text-center">
                                <img id="EditLoader" class="loading-icon m-5" src="{{asset('admin/images/loader.svg')}}">
                                <h5 id="EditWrong" class="d-none">Something Went Wrong!</h5>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">No</button>
                                <button type="button" id="EditConfirmBtn" data-id="" class="btn btn-sm btn-success">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-------------------------------Insert MODAL------------------------------------------->


            <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">

                        <div class="modal-body mx-3">

                            <h5>Add Fee Category</h5>


                            <div id="addForm">
<div>
    <select class="custom-select custom-select-sm">
        <option value="1">Option 1</option>
        <option value="2">Option 2</option>
        <option value="3">Option 3</option>
        <option value="4">Option 4</option>
        <option value="5">Option 5</option>
    </select>
</div>

<br/>
                                <input type="text" id="addfeeCatId" class="form-control validate" placeholder="Fee Category"><br/>
                                <input type="text" id="addfeeClsId" class="form-control validate" placeholder="Class"><br/>
                                <input type="text" id="addfeeAmId" class="form-control validate" placeholder="Amount"><br/>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">No</button>
                                <button type="button" id="addConfirmBtn" data-id="" class="btn btn-sm btn-success">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @endsection


            @section('script')


                <script type="text/javascript">

                    getData();
                    function getData() {
                        axios.get('/setups/amount/getData')
                            .then(function(response) {

                                if (response.status == 200) {

                                    $('#mainDiv').removeClass('d-none');
                                    $('#loaderDiv').addClass('d-none');
                                    $('#DataTable').DataTable().destroy();
                                    $('#table').empty();
                                    var jsonData = response.data;

                                    $.each(jsonData, function(i,v) {
                                        $('<tr>').html(

                                            "<th>" + jsonData[i].id + "</th>" +
                                            "<th>" + jsonData[i].fee_category_id + "</th>" +
                                            "<th>" + jsonData[i].class_id + "</th>" +
                                            "<th>" + jsonData[i].amount + "</th>" +
                                            "<td ><a class='Edit' data-id=" + jsonData[i].id + "><i class='fas fa-edit'></i></a></td>"+
                                            "<td ><a class='Delete' data-id=" + jsonData[i].id + "><i class='fas fa-trash-alt'></i></a></td>"

                                        ).appendTo('#table');
                                    });

                                    $('.Delete').click(function() {
                                        var id = $(this).data('id');
                                        $('#DeleteId').html(id);

                                        $('#deleteModal').modal('show');

                                    });
                                    $('.Edit').click(function() {
                                        var id = $(this).data('id');
                                        $('#EditId').html(id);
                                        getUpdateDetails(id);
                                        $('#editModal').modal('show');

                                    });

                                    $('#DataTable').DataTable({
                                        "order": false
                                    });
                                    $('.dataTables_length').addClass('bs-select')

                                } else {
                                    $('#loaderDiv').addClass('d-none');
                                    $('#WrongDiv').removeClass('d-none');
                                }


                            })
                            .catch(function(error) {
                                $('#loaderDiv').addClass('d-none');
                                $('#WrongDiv').removeClass('d-none');
                            })


                    }


                    $('#DeleteConfirmBtn').click(function() {

                        var id = $('#DeleteId').html();
                        deleteData(id);

                    });


                    function deleteData(deleteId) {
                        $('#DeleteConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>");
                        axios.post('/setups/amount/deleteData', {
                            id: deleteId
                        })

                            .then(function(response) {

                                if (response.status == 200) {
                                    if (response.data == 1) {
                                        $('#deleteModal').modal('hide');
                                        toastr.success('Delete Success');
                                        getData();


                                    } else {
                                        $('#deleteModal').modal('hide');
                                        toastr.error('Delete Failed');
                                        getData();


                                    }

                                } else {
                                    $('#deleteModal').modal('hide');
                                    toastr.error('Something Went wrong')


                                }

                            })
                            .catch(function(error) {

                                $('#deleteModal').modal('hide');
                                toastr.error('Something Went wrong')

                            })

                    }

                    function getUpdateDetails(detailsId) {

                        axios.post('/setups/amount/getDetails', {
                            id: detailsId
                        })
                            .then(function(response) {

                                if (response.status == 200) {
                                    $('#EditForm').removeClass('d-none');
                                    $('#EditLoader').addClass('d-none');

                                    var jsonData = response.data;


                                    $('#feeCatId').val(jsonData[0].fee_category_id);
                                    $('#feeClsId').val(jsonData[0].class_id);
                                    $('#feeAmId').val(jsonData[0].amount);


                                } else {


                                    $('#EditLoader').addClass('d-none');
                                    $('#EditWrong').removeClass('d-none');


                                }

                            })
                            .catch(function(error) {
                                $('#EditLoader').addClass('d-none');
                                $('#EditWrong').removeClass('d-none');
                            })



                    }

                    $('#EditConfirmBtn').click(function() {

                        var id = $('#EditId').html();
                        var feeCat = $('#feeCatId').val();
                        var feeCls = $('#feeClsId').val();
                        var feeAm = $('#feeAmId').val();

                        updateDetails(id,feeCat,feeCls,feeAm);

                    });

                    function updateDetails(id, fee_category_id,class_id,amount) {
                        if (fee_category_id.length == 0) {
                            toastr.error('Fee Category is empty');

                        } else if(class_id.length == 0) {
                            toastr.error('Class is empty');
                        }else if(amount.length == 0){
                                toastr.error('Amount is empty');
                        }else {

                            $('#EditConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>");
                            var url = '/setups/amount/updateData';
                            var detailsData = {
                                id: id,
                                fee_category_id:fee_category_id,
                                class_id:class_id,
                                amount:amount
                            };
                            axios.post(url, detailsData)
                                .then(function(response) {

                                    $('#EditConfirmBtn').html('Save');

                                    if (response.status == 200) {
                                        if (response.data == 1) {

                                            $('#editModal').modal('hide');
                                            toastr.success("Update Success");
                                            getData();
                                        } else {

                                            $('#editModal').modal('hide');
                                            toastr.error("Update Failed");
                                            getData();

                                        }

                                    } else {
                                        $('#editModal').modal('hide');
                                        toastr.error("Something went wrong");

                                    }

                                })
                                .catch(function(error) {
                                    $('#editModal').modal('hide');
                                    toastr.error("Something went wrong");
                                })

                        }

                    }




                    $('#addNew').click(function() {

                        $('#addModal').modal('show');

                    });

                    $('#addConfirmBtn').click(function() {


                        var feeCat = $('#addfeeCatId').val();
                        var feeCls = $('#addfeeClsId').val();
                        var feeAm = $('#addfeeAmId').val();

                        insertDetails(feeCat,feeCls,feeAm);

                    });

                    function insertDetails(fee_category_id,class_id,amount) {
                        if (fee_category_id.length == 0) {
                            toastr.error('Fee Category is empty');

                        } else if(class_id.length == 0) {
                            toastr.error('Class is empty');
                        }else if(amount.length == 0){
                            toastr.error('Amount is empty');
                        } else {

                            $('#AddConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>")
                            var url = '/setups/amount/insertData';
                            var detailsData = {

                                fee_category_id: fee_category_id,
                                class_id: class_id,
                                amount: amount,
                            };
                            axios.post(url, detailsData)
                                .then(function(response) {

                                    $('#addConfirmBtn').html('Save');

                                    if (response.status == 200) {
                                        if (response.data == 1) {

                                            $('#addModal').modal('hide');
                                            toastr.success("Insert Success");
                                            getData();
                                        } else {

                                            $('#addModal').modal('hide');
                                            toastr.error("Insert Failed");
                                            getData();

                                        }

                                    } else {
                                        $('#addModal').modal('hide');
                                        toastr.error("Something went wrong");

                                    }

                                })
                                .catch(function(error) {
                                    $('#addModal').modal('hide');
                                    toastr.error("Something went wrong");
                                })

                        }

                    }

                </script>


@endsection
