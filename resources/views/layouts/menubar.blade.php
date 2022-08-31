<nav class="light-blue navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="index.html">
            <img src="{{url('images/extratech-logo.png')}}" alt="Extratech-logo"/>
        </a>
        <a class="navbar-brand brand-logo-mini" href="index.html">
            <img src="{{url('images/ET-Minilogo.png')}}" alt="logo"/>
        </a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-stretch justify-content-between">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <img src="{{url('images/navigation-bar.png')}}" alt="" />
        </button>
        <div class="navbar-right d-flex">
            <ul class="navbar-nav d-flex align-items-center">
                <li class="dropdown-export-menu">
                    <div class="dropdown">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{url('images/bell-icon.png')}}" alt="image-notification" />
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="#">Notification 1</a></li>
                            <li><a class="dropdown-item" href="#">Notification 2</a></li>
                            <li><a class="dropdown-item" href="#">Notification 3</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-profile d-flex dropdown-export-menu mx-3">
                    <a class="" href="#">
                        <div class="nav-profile-img">
                            @if(Auth::user()->user_type == array_search('Student',config('custom.user_types')))
                                <img src="{{url(Auth::user()->student->image)}}" alt="image" />
                            @else
                                <img src="{{url('images/profile.jpg')}}" alt="image" />
                            @endif
                        </div>
                        <div class="nav-profile-text">
                            <p class="mb-1">{{Auth::user()->name}}</p>
                            @if(Auth::user()->user_type == array_search('Student',config('custom.user_types')))
                                <p class="mb-1">{{Auth::user()->admission->student_id}}</p>
                            @endif
                        </div>
                        <div class="">
                            <button>
                                <i class="fa-solid fa-caret-down"></i>
                            </button>
                            <div class="dropdown-content-export-menu">
                                <ul>
                                    <li>
                                        <a href="{{url('logout')}}">
                                            Logout
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            Change Password
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>










