<div class="left-side-menu">
  <div class="h-100" data-simplebar>
    <!-- User box -->
    <div class="user-box text-center">

      <img src="{{asset('uploads/profile_pic/thumb/'.Auth::user()->image)}}" alt="user-img" title="Mat Helme" class="rounded-circle avatar-md" />
      <p class="text-muted mt-2">{{Auth::user()->name}}</p>
    </div>

    <!--- Sidemenu -->
    <div id="sidebar-menu">
      <ul id="side-menu">

        
        <li>
          <a href="{{route('dashboard')}}">
            <span> Dashboard </span>
          </a>
        </li>

        <li>
          <a href="#sidebarEcommerce" data-toggle="collapse">
            <i data-feather="users"></i>
            <span> Parties </span>
            <span class="menu-arrow"></span>
          </a>
          <div class="collapse" id="sidebarEcommerce">
            <ul class="nav-second-level">
              <li>
                <a href="{{route('party.create')}}"><i data-feather="plus" class="pr-0 mr-1"></i>Add
                  New</a>
              </li>
              <li>
                <a href="{{route('party.index')}}"><i data-feather="list" class="pr-0 mr-1"></i>Manage
                  Parties</a>
              </li>
            </ul>
          </div>
        </li>
        <li>
          <a href="#sidebarCrm" data-toggle="collapse">
            <i data-feather="edit"></i>
            <span> GST Billing </span>
            <span class="menu-arrow"></span>
          </a>
          <div class="collapse" id="sidebarCrm">
            <ul class="nav-second-level">
              <li>
                <a href="{{route('gst-billing.create')}}"><i data-feather="plus" class="pr-0 mr-1"></i>Create
                  bill</a>
              </li>
              <li>
                <a href="{{route('gst-billing.index')}}"><i data-feather="list" class="pr-0 mr-1"></i>Manage all
                  bills</a>
              </li>
            </ul>
          </div>

  


        </li>


        <li>
          <a href="#sidebarVendor" data-toggle="collapse">
            <i data-feather="user"></i>
            <span> Vendor Billing </span>
            <span class="menu-arrow"></span>
          </a>
          <div class="collapse" id="sidebarVendor">
            <ul class="nav-second-level">
              <li>
                <a href="{{route('vendor-invoice.create')}}"><i data-feather="plus" class="pr-0 mr-1"></i>Add Vendor Bill</a>
              </li>
              <li>
                <a href="{{route('vendor-invoice.index')}}"><i data-feather="list" class="pr-0 mr-1"></i>All
                  Vendor bills</a>
              </li>
            </ul>
          </div>

  


        </li>


        <li>
          <a href="{{route('CompanyDetail',Auth::user()->id)}}">
            <i data-feather="star"></i>
            <span> Company Detail </span>
          </a>

        </li>



      </ul>
    </div>
    <!-- End Sidebar -->

    <div class="clearfix"></div>
  </div>
  <!-- Sidebar -left -->
</div>