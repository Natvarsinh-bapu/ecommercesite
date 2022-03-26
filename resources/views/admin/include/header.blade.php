<nav class="navbar navbar-default navbar-fixed-top">
    <div style="float: left;background-color:#fff;padding: 0 40px;">
        <a href="{{ route('admin') }}">
            <img src="{{ asset('images/logo.png') }}" alt="{{ config('app.name') }}" class="img-responsive logo" style="height: 80px;">
        </a>
    </div>
    <div class="container-fluid">
        <div class="navbar-btn">
            <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
        </div>
        
        {{-- <form class="navbar-form navbar-left">
            <div class="input-group">
                <input type="text" value="" class="form-control" placeholder="Search dashboard...">
                <span class="input-group-btn"><button type="button" class="btn btn-primary">Go</button></span>
            </div>
        </form> --}}
        
        {{-- <div class="navbar-btn navbar-btn-right">
            <a class="btn btn-success update-pro" href="https://www.themeineed.com/downloads/klorofil-pro-bootstrap-admin-dashboard-template/?utm_source=klorofil&utm_medium=template&utm_campaign=KlorofilPro" title="Upgrade to Pro" target="_blank"><i class="fa fa-rocket"></i> <span>UPGRADE TO PRO</span></a>
        </div> --}}
        
        <div id="navbar-menu">            
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <div style="margin-top: 20%">
                        <a class="btn btn-success" href="{{ url('/') }}" target="_blank">
                            Go to front <i class="fa fa-paper-plane"></i>
                        </a>
                    </div>
                </li>
                {{-- <li class="dropdown">
                    <a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                        <i class="lnr lnr-alarm"></i>
                        <span class="badge bg-danger">5</span>
                    </a>
                    <ul class="dropdown-menu notifications">
                        <li><a href="#" class="notification-item"><span class="dot bg-warning"></span>System space is almost full</a></li>
                        <li><a href="#" class="notification-item"><span class="dot bg-danger"></span>You have 9 unfinished tasks</a></li>
                        <li><a href="#" class="notification-item"><span class="dot bg-success"></span>Monthly report is available</a></li>
                        <li><a href="#" class="notification-item"><span class="dot bg-warning"></span>Weekly meeting in 1 hour</a></li>
                        <li><a href="#" class="notification-item"><span class="dot bg-success"></span>Your request has been approved</a></li>
                        <li><a href="#" class="more">See all notifications</a></li>
                    </ul>
                </li> --}}
                {{-- <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="lnr lnr-question-circle"></i> <span>Help</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Basic Use</a></li>
                        <li><a href="#">Working With Data</a></li>
                        <li><a href="#">Security</a></li>
                        <li><a href="#">Troubleshooting</a></li>
                    </ul>
                </li> --}}

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    
                </div>
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        {{-- <img src="assets/img/user.png" class="img-circle" alt="">  --}}
                        <span>
                            {{ Auth::guard('admin')->user()->name }}
                        </span>
                         &nbsp; <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                    <ul class="dropdown-menu">
                        {{-- <li><a href="#"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
                        <li><a href="#"><i class="lnr lnr-envelope"></i> <span>Message</span></a></li>
                        <li><a href="#"><i class="lnr lnr-cog"></i> <span>Settings</span></a></li>
                        <li><a href="#"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li> --}}
                        {{-- <li>
                            <a href="{{ url('/admin/change-password') }}"><i class="fa fa-key"></i> <span>Change Password</span></a>
                        </li> --}}
                        <li>
                            <a class="dropdown-item" href="{{ route('admin.logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                <i class="lnr lnr-exit"></i>
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>                        
                    </ul>
                </li>
                
                <!-- <li>
                    <a class="update-pro" href="https://www.themeineed.com/downloads/klorofil-pro-bootstrap-admin-dashboard-template/?utm_source=klorofil&utm_medium=template&utm_campaign=KlorofilPro" title="Upgrade to Pro" target="_blank"><i class="fa fa-rocket"></i> <span>UPGRADE TO PRO</span></a>
                </li> -->
            </ul>
        </div>
    </div>
</nav>