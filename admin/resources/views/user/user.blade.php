@extends('layout.app')
@section('title','Home')
@section('content')

    <div id="mainDiv" class="container d-none">
        <div class="row">
            <div class="col-md-12 p-5">
                <button  id="addNewBtnId" class="my-3 btn btn-sm btn-danger">ADD NEW</button>
                <table id="DataTable" class="table table-striped table-sm table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th class="th-sm">SL No.</th>
                        <th class="th-sm">Role</th>
                        <th class="th-sm">Name</th>
                        <th class="th-sm">Email</th>
                        {{--                        <th class="th-sm">Password</th>--}}
                        <th class="th-sm">Code</th>
                        <th class="th-sm">Edit</th>
                        <th class="th-sm">Delete</th>
                    </tr>
                    </thead>
                    <tbody id="table_Id">

                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <!--------------------------LOADER ----------------->

    <div id="loaderDiv" class="container">
        <div class="row">
            <div class="col-md-12 p-5 text-center">
                <img class="loading-icon m-5" src="{{asset('admin/images/loader.svg')}}" alt="">
            </div>
        </div>
    </div>
    <div id="wrongDiv" class="container d-none">
        <div class="row">
            <div class="col-md-12 p-5 text-center">

                <h2>Something Went Wrong!</h2>
            </div>
        </div>
    </div>
    <!-------------------------------DELETE MODAL------------------------------------------->

    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-body text-center p-2 mt-3">
                    <p class="">Do You Want to Delete?</p>
                    <span id="Test_Delete_Id"></span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">No</button>
                    <button type="button"  id="usersDeleteConfirmBtn" data-id="" class="btn btn-sm btn-danger">Yes</button>
                </div>
            </div>
        </div>
    </div>
    <!-------------------------------Edit MODAL------------------------------------------->

    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold green-text ">UPDATE SERVICES</h4>
                    <span id="Test_Edit_Id"></span>
                </div>
                <div class="modal-body mx-3">
                    <div id="EditForm" class="d-none">

                        <div class="md-form mb-5">
                            <i class="fas fa-user prefix grey-text"></i>
                            <select id="RoleId"  class="form-control select ml-5">
                                <option>Select Role</option>
                                <option value="Admin">Admin</option>
                                <option value="Operator">Operator</option>
                            </select>
                        </div>
                        <div class="md-form mb-5">
                            <i class="fas fa-user prefix grey-text"></i>

                            <input type="text" id="NameId" class="form-control validate" placeholder="Name"/>
                        </div>

                        <div class="md-form mb-5">
                            <i class="fas fa-user prefix grey-text"></i>
                            <input type="text" id="EmailId" class="form-control validate" placeholder="Email"/>
                            {{--                            <span style="color: red">{{  ($errors->has('email'))?($errors->first('email')):''}}</span>--}}
                        </div>

                    </div>
                    <div class="text-center">
                        <img id="EditLoader" class="loading-icon m-5" src="{{asset('admin/images/loader.svg')}}">
                        <h5 id="EditWrong" class="d-none">Something Went Wrong!</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">No</button>
                        <button type="button" id="usersEditConfirmBtn" data-id="" class="btn btn-sm btn-success">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-------------------------------ADD MODAL------------------------------------------->
    <!-- Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold green-text ">ADD NEW USERS</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body mx-3">

                    <div id="AddForm" class="">

                        <div class="md-form mb-5">
                            <i class="fas fa-user prefix grey-text"></i>
                            <select id="Role_Id"  class="form-control select ml-5">
                                <option>Select Role</option>
                                <option value="Admin">Admin</option>
                                <option value="Operator">Operator</option>
                            </select>
                        </div>

                        <div class="md-form mb-5">
                            <i class="fas fa-user prefix grey-text"></i>
                            <input type="text" id="Name_Id" class="form-control validate" placeholder="Name"/>
                        </div>

                        <div class="md-form mb-5">
                            <i class="fas fa-user prefix grey-text"></i>
                            <input type="text" id="Email_Id" class="form-control validate" placeholder="Email"/>

                        </div>

                        {{--                        <div class="md-form mb-5">--}}
                        {{--                            <i class="fas fa-user prefix grey-text"></i>--}}
                        {{--                            <input type="text" id="Pass_Id" class="form-control validate" placeholder="Password"/>--}}
                        {{--                        </div>--}}



                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">No</button>
                        <button type="button" id="usersAddConfirmBtn" data-id="" class="btn btn-sm btn-success">INSERT</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="msg">
        <span style="color: red">{{  ($errors->has('email'))?($errors->first('email')):''}}</span>
    </div>
@endsection

@section('script')

    <script>









        getUsersData();

        <!---------------------------- CUSTOM AJAX JS ----------------------- -->

        function getUsersData() {

            axios.get("/students/user/getData")

                .then(function (response) {

                    if (response.status == 200) {
                        $('#mainDiv').removeClass('d-none')
                        $('#loaderDiv').addClass('d-none')
                        $("#DataTable").DataTable().destroy()
                        $('#table_Id').empty();

                        var jsonData = response.data;
                        for (var i = 0; i < jsonData.length; i++) {
                            var x=i+1;
                            $('<tr>').html(
                                "<td>" + x + "</td>"+
                                "<td>" + jsonData[i].role + "</td>"+
                                "<td>" + jsonData[i].name + "</td>"+
                                "<td>" + jsonData[i].email + "</td>"+
                                // "<td>" + jsonData[i].password + "</td>"+
                                "<td>" + jsonData[i].code + "</td>"+
                                "<td><a  class='EditBtn' data-id=" + jsonData[i].id + "><i class='fas fa-edit'></i></a></td>" +
                                "<td><a  class='DeleteBtn' data-id=" + jsonData[i].id + "><i class='fas fa-trash'></i></a></td>"
                            ).appendTo('#table_Id');
                        }


                        //Service Table Delete Icon Click
                        $('.DeleteBtn').click(function () {
                            var id = $(this).data("id")
                            $('#Test_Delete_Id').html(id)
                            $('#deleteModal').modal('show')

                        });

                        //Service Table Edit Icon Click
                        $('.EditBtn').click(function () {
                            var id = $(this).attr("data-id");
                            $('#Test_Edit_Id').html(id)
                            UserEditDetails(id)
                            $('#editModal').modal('show')
                        });

                        $("#DataTable").DataTable({"order":false})
                        $('.dataTables_length').addClass('bs-select')

                    } else {
                        $('#loaderDiv').addClass('d-none')
                        $('#wrongDiv').removeClass('d-none')
                    }
                }).catch(function (error) {
                $('#loaderDiv').addClass('d-none')
                $('#wrongDiv').removeClass('d-none')

            })

        }

        $('#usersDeleteConfirmBtn').click(function () {
            var id = $('#Test_Delete_Id').html()
            toUserDelete(id)
        });
        function toUserDelete(id) {

            $('#usersDeleteConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>")
            var url = '/students/user/deleteData';
            var jsonObj = {
                id: id
            }
            axios.post(url, jsonObj)
                .then(function (response) {
                    $('#usersDeleteConfirmBtn').html("YES")

                    if (response.status == 200) {
                        if (response.data == 1) {

                            $('#deleteModal').modal('hide')
                            toastr.success('Delete Success');
                            getUsersData()
                        } else {
                            $('#deleteModal').modal('hide')
                            toastr.warning('Delete Failed');
                            getUsersData()
                        }
                    } else {
                        $('#deleteModal').modal('hide')
                        toastr.error('Something Went Wrong');
                    }
                }).catch(function () {

                $('#deleteModal').modal('hide')
                toastr.error('Something Went Wrong');
            })
        }

        //EACH SERVICES UPDATE DETAILS

        function UserEditDetails(ID) {



            var url = '/students/user/getDetails';
            var jsonObj = {
                id: ID,
            }
            axios.post(url, jsonObj)
                .then(function (response) {

                    if (response.staus = 200) {

                        $('#EditForm').removeClass('d-none')
                        $('#EditLoader').addClass('d-none');

                        var jsonData = response.data;
                        $('#RoleId').val(jsonData[0].role);
                        $('#NameId').val(jsonData[0].name);
                        $('#EmailId').val(jsonData[0].email);

                    } else {
                        $('#EditLoader').addClass('d-none');
                        $('#EditWrong').removeClass('d-none');
                    }

                }).catch(function () {
                $('#EditLoader').addClass('d-none');
                $('#EditWrong').removeClass('d-none');
            })
        }


        $("#usersEditConfirmBtn").click(function () {

            var id=$('#Test_Edit_Id').html()
            var role = $('#RoleId').val()
            var name = $('#NameId').val()
            var email = $('#EmailId').val()


            toUserUpdate(id,role, name,email)
        })
        function toUserUpdate(id,role, name,email) {

            if (role.length == 0) {
                toastr.error('Role is empty !');
            }else if(name.length==0){
                toastr.error('Name is empty !');
            }else if(email.length==0) {
                toastr.error('Email is empty !');

            }else {



                var url= '/students/user/updateData';
                var jsonObj = {id: id,role: role,name: name,email: email }

                $('#usersEditConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>")
                axios.post(url, jsonObj)
                    .then(function (response) {
                        $('#usersEditConfirmBtn').html("SAVE");
                        if (response.status == 200) {
                            if (response.data == 1) {
                                $('#editModal').modal('hide')
                                toastr.success('Update Success');
                                getUsersData()
                            } else {
                                $('#editModal').modal('hide')
                                toastr.error('Update Failed');
                                getUsersData()
                            }
                        } else {
                            $('#editModal').modal('hide')
                            toastr.error('Something Went Wrong');
                        }
                    }).catch(function () {
                    $('#editModal').modal('hide')
                    toastr.error('Something Went Wrong');
                })

            }
        }
        $('#addNewBtnId').click(function () {
            $('#addModal').modal('show');

        });

        $("#usersAddConfirmBtn").click(function () {

            var role = $("#Role_Id").val()
            var name = $("#Name_Id").val()
            var email = $("#Email_Id").val()
            // var pass = $("#Pass_Id").val()

            toUserAdd(role,name,email)
        })

        function toUserAdd(role,name,email) {

            if (role.length == 0) {
                toastr.error('Role is empty !');
            }else if(name.length==0){
                toastr.error('Name is empty !');
            }else if(email.length==0){
                toastr.error('Email is empty !');

            } else {

                var url = '/students/user/insertData';
                var jsonObj = { role: role,name: name,email: email }

                $('#usersAddConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>")
                axios.post(url, jsonObj)
                    .then(function (response) {

                        $('#usersAddConfirmBtn').html("SAVE");

                        if (response.status == 200) {
                            if (response.data == 1) {
                                $('#addModal').modal('hide')
                                toastr.success('Insert Success');
                                getUsersData()
                            } else {
                                $('#addModal').modal('hide')
                                toastr.error('Insert Failed');

                                getUsersData()
                            }
                        } else {
                            $('#addModal').modal('hide')
                            toastr.error('Something Went Wrong ');
                            $('#usersAddConfirmBtn').html("SAVE");
                        }
                    }).catch(function () {
                    $('#addModal').modal('hide')
                    toastr.error('Something Went Wrong');
                    toastr.warning("Email Field Will be Unique")
                    $('#usersAddConfirmBtn').html("SAVE");
                })
            }
        }
        <!-- ---------------------------END SCRIPT--------------------------- -->
    </script>
@endsection


