
<div id="main-wrapper">
    <header class="topbar">
        <nav class="navbar top-navbar navbar-expand-md navbar-light">
            <div class="navbar-collapse">
                <ul class="navbar-nav mr-auto mt-md-0">
                    <li class="nav-item "> <a class="nav-link nav-toggler  hidden-md-up  waves-effect waves-dark" href="javascript:void(0)"><i class="fas  fa-bars"></i></a></li>
                    <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="fas fa-bars"></i></a> </li>
                    <li class="nav-item mt-3">ABC School</li>
                </ul>
                <ul class="navbar-nav my-lg-0">
                    <li class="nav-item"><a href="{{url('/LoginIndex')}}" class="btn btn-sm btn-danger">Logout</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <aside class="left-sidebar">
        <div class="sidebar-submenu">
            <nav class="sidebar-nav">
                <ul id="sidebar-dropdown">
                    <li class="nav-devider mt-0" style="margin-bottom: 5px"></li>
                    <li> <a href="{{url('/')}}" ><span> <i class="fas fa-home"></i> </span><span class="hide-menu">Home</span></a></li>
                    <li> <a href="{{url('/visitor')}}" ><span> <i class="fas fa-users"></i> </span><span class="hide-menu">Visitor</span></a></li>
                    <li> <a href="{{url('students/user/userView')}}" ><span> <i class="fas fa-users"></i> </span><span class="hide-menu">Manage User</span></a></li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span> <i class="fas fa-school"></i> </span><span class="hide-menu">Manage Setup</span></a>
                        <ul class="dropdown-menu forAnimate" role="menu">
                            <li><a href="{{url('setups/class/classView')}}">ManageClass</a></li>
                            <li><a href="{{url('setups/year/yearView')}}">Manage Year</a></li>
                            <li><a href="{{url('setups/group/groupView')}}">Manage Group</a></li>
                            <li><a href="{{url('setups/shift/shiftView')}}">Manage Shift</a></li>
                            <li><a href="{{url('setups/feeCat/feeCatView')}}">Manage Fee Category</a></li>
                            <li><a href="{{url('setups/amount/amountView')}}">Manage Fee Amount</a></li>
                            <li><a href="{{url('setups/examType/examTypeView')}}">Manage Exam Type</a></li>
                            <li><a href="{{url('setups/subject/subjectView')}}">Manage Subject</a></li>
                            <li><a href="{{url('setups/assignsubject/assignsubjectView')}}">Assign Subject</a></li>
                            <li><a href="{{url('setups/designation/designationView')}}">Designation</a></li>

                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span> <i class="fas fa-user-graduate"></i> </span><span class="hide-menu">Manage Student</span></a>
                        <ul class="dropdown-menu forAnimate" role="menu">

                            <li><a href="{{url('students/student/studentView')}}">Student Registration</a></li>
                            <li><a href="{{url('students/roll/view')}}">Roll Generate</a></li>

                        </ul>
                    </li>



                    <li> <a href="{{url('/messeges')}}" ><span> <i class="fas fa-envelope"></i> </span><span class="hide-menu">Messeges</span></a></li>
                    <li> <a href="{{url('/reviews')}}" ><span> <i class="fab fa-rocketchat"></i> </span><span class="hide-menu">Reviews</span></a></li>

                </ul>
            </nav>
        </div>
    </aside>
    <div class="page-wrapper">





