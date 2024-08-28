<div class="navbar-custom">

  <div class="container-fluid">
    <ul class="list-unstyled topnav-menu float-right mb-0">

      <!-- All-->

      <li class="dropdown notification-list topbar-dropdown">
        <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#"
          role="button" aria-haspopup="false" aria-expanded="false">

         
          <img src="{{asset('uploads/profile_pic/thumb/'.Auth::user()->image)}}" alt="user-image" class="rounded-circle" />

      


          <span class="pro-user-name ml-1">
            {{Auth::user()->name}} <i class="mdi mdi-chevron-down"></i>
          </span>
        </a>
        <div class="dropdown-menu dropdown-menu-right profile-dropdown">
          <!-- item-->
          <div class="dropdown-header noti-title">
            <h6 class="text-overflow m-0">Welcome !</h6>
          </div>

          <!-- item-->
          <a href="{{route('users.edit',Auth::user()->id)}}" class="dropdown-item notify-item">
            <i class="fe-user"></i>
            <span>My Account</span>
          </a>

          <div class="dropdown-divider"></div>

          <!-- item-->
          <a href="{{route('logout')}}" class="dropdown-item notify-item">
            <i class="fe-log-out"></i>
            <span>Logout</span>
          </a>
        </div>
      </li>
    </ul>

    <!-- LOGO -->
    <div class="logo-box">
      <a href="{{route('dashboard')}}" class="logo logo-dark text-center">
        <span class="logo-sm">
         
          <img src="{{asset('assets/images/logo/logo.png')}}" alt="" height="70" />
          <!-- <span class="logo-lg-text-light">UBold</span> -->
        </span>
        <span class="logo-lg">
          <img src="{{asset('assets/images/logo/logo.png')}}" alt="" height="70" />
          <!-- <span class="logo-lg-text-light">U</span> -->
        </span>
      </a>

      <a href="{{route('dashboard')}}" class="logo logo-light text-center">
        <span class="logo-sm">
          <img src="{{asset('assets/images/logo/logo.png')}}" alt="" height="70" />
        </span>
        <span class="logo-lg">
          <img src="{{asset('assets/images/logo/logo.png')}}" alt="" height="70" />


        </span>
      </a>
    </div>

    <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
      <li>
        <button class="button-menu-mobile waves-effect waves-light">
          <i class="fe-menu"></i>
        </button>
      </li>

      <li>
        <!-- Mobile menu toggle (Horizontal Layout)-->
        <a class="navbar-toggle nav-link" data-toggle="collapse" data-target="#topnav-menu-content">
          <div class="lines">
            <span></span>
            <span></span>
            <span></span>
          </div>
        </a>
        <!-- End mobile menu toggle-->
      </li>
    </ul>
    <div class="clearfix"></div>
  </div>
</div>