<div class="modal fade" id="importModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Import File</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
                <form action="{{route('admins.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="file" name="importfile">
                    <span class="input-group-btn" style="float: right !important;">
                    <center>
                        <input type="submit" value="Import" class="mt-2 btn btn-success text-center" style="font-weight: bold;">
                    </center> 
                    </div> 
                </form>
        </div>
        
        </div>
    </div>
    </div>

    <!-- Change password -->





 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <div>
    <a href="{{route('agents.index')}}" class="brand-link">
      <img src="dist/img/white.png" style="max-width: 80%;">
    </a>
</div>
    <!-- Sidebar -->
    <div class="sidebar">
    @if(Auth::user()->rank=='admin')

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-plus"></i>
              <p>
                Admin
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{route('agents.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Employee</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('accounts.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Accounts & Contracts</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('active.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Active Employee</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('emp.inactive')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inactive Employee</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('staffs.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Staffs</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-sliders-h"></i>
              <p>
                Settings
              <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admins.export')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Export Excel</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link" data-bs-toggle="modal" data-bs-target="#importModal">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Import Excel</p>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a href="{{route('change_password.index',Auth::user()->id)}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Change Password</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('logout')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Log Out</p>
                </a>
              </li> -->
            </ul>
        </ul>
      </nav>
      @endif
      @if(Auth::user()->rank=='staff')

<!-- Sidebar Menu -->
<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->
    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-user-plus"></i>
        <p style="text-transform: capitalize;">
        {{auth::user()->staffs->fname}} {{auth::user()->staffs->lname}}
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
      <li class="nav-item">
          <a href="{{route('agents.index')}}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Employee</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('accounts.index')}}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Accounts & Contracts</p>
          </a>
        </li>
        <li class="nav-item">
                <a href="{{route('active.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Active Employee</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('emp.inactive')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inactive Employee</p>
                </a>
              </li>
      </ul>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-sliders-h"></i>
        <p>
          Settings
        <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{route('admins.export')}}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Export Excel</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="" class="nav-link" data-bs-toggle="modal" data-bs-target="#importModal">
            <i class="far fa-circle nav-icon"></i>
            <p>Import Excel</p>
          </a>
        </li>
        <!-- <li class="nav-item">
          <a href="{{route('change_password.index',Auth::user()->id)}}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
              <p>Change Password</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('logout')}}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Log Out</p>
          </a>
        </li> -->
      </ul>
  </ul>
</nav>
@endif
    </div>
    
  </aside>