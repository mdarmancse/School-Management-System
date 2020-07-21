
<div id="main-wrapper">
    <header class="topbar">
        <nav class="navbar top-navbar navbar-expand-md navbar-light">
            <div class="navbar-collapse">
                <ul class="navbar-nav mr-auto mt-md-0">
                    <li class="nav-item "> <a class="nav-link nav-toggler  hidden-md-up  waves-effect waves-dark" href="javascript:void(0)"><i class="fas  fa-bars"></i></a></li>
                    <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="fas fa-bars"></i></a> </li>
                    <li class="nav-item mt-3">ADMIN</li>
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

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span> <<i class="fas fa-school"></i> </span></span><span class="hide-menu">Setup</span></a>
                        <ul class="dropdown-menu forAnimate" role="menu">
                            <li><a href="{{url('/visitor')}}">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>

                        </ul>
                    </li>

                    <li> <a href="{{url('/messeges')}}" ><span> <i class="fas fa-envelope"></i> </span><span class="hide-menu">Messeges</span></a></li>
                    <li> <a href="{{url('/reviews')}}" ><span> <i class="fab fa-rocketchat"></i> </span><span class="hide-menu">Reviews</span></a></li>

                </ul>
            </nav>
        </div>
    </aside>
    <div class="page-wrapper">





