  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    @if(Auth::user()->rank=='admin')
    <ul class="navbar-nav  ml-auto">
      <li class="nav-item">
        <a class="nav-link" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-bs-toggle="dropdown">
            @if(Auth::user()->rank== 'admin')
              <h6 class="text-center text-black text-uppercase" >admin</h6>
            @elseif(Auth::user()->rank == 'staff')
              <h6 class="text-center text-black text-uppercase" >{{auth::user()->username}}</h6>
            @endif
        </a>
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{route('change_password.index',Auth::user()->id)}}">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Change Password
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{route('logout')}}">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
        </div>
      </li>
      <li class="nav-item" style="margin-top: -5px;">
        <a class="nav-link" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-bs-toggle="dropdown">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                <img class="img-circle elevation-2" style="border-radius:100%;width:35px;"
                    src="/img/undraw_profile.svg">
            </span>
        </a>
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{route('change_password.index',Auth::user()->id)}}">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Change Password
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{route('logout')}}">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
      </li>
    </ul>
    @endif
    @if(Auth::user()->rank=='staff')
    <ul class="navbar-nav  ml-auto">
      <li class="nav-item">
        <a class="nav-link" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-bs-toggle="dropdown">
            @if(Auth::user()->rank== 'admin')
              <h6 class="text-center text-black text-uppercase" >admin</h6>
            @elseif(Auth::user()->rank == 'staff')
              <h6 class="text-center text-black text-uppercase" >{{auth::user()->staffs->users->username}}</h6>
            @endif
        </a>
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{route('logout')}}">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
        </div>
      </li>
      <li class="nav-item" style="margin-top: -5px;">
        <a class="nav-link" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-bs-toggle="dropdown">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                <img class="img-circle elevation-2" style="border-radius:100%;width:35px;"
                    src="/img/undraw_profile.svg">
            </span>
        </a>
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{route('logout')}}">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
      </li>
    </ul>
    @endif
  </nav>
  <!-- /.navbar -->