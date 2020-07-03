
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('lte/dist/img/mg.jpg')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">MG Project</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('lte/dist/img/user2-160x160.jpg')}}" 
          class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        <a href="#" class="d-block">{{auth()->user()->name}}::{{auth()->user()->role}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview"
         role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
                <a href="{!!route('dashboard')!!}" class="nav-link {!! Request::is('dashboard') ? 'active' : '' !!}">
                  <i class="fas fa-home nav-icon"></i>
                  <p>Home</p>
                </a>
              </li>
              @if (in_array(auth()->user()->role,['ADM','USR']))                  
                <li class="nav-item has-treeview {!! Request::is(['blank','admin/*',
                  'admin/param*']) ? 'menu-open' : '' !!}">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fa fa-bars"></i>
                    <p> Admin<i class="right fas fa-angle-left"></i></p>
                  </a>
                  <ul class="nav nav-treeview">

                    @if (in_array(auth()->user()->role,['ADM','USR1'])) 
                      <li class="nav-item">
                        <a href="{!!route('exim')!!}" class="nav-link {!! Request::is('admin/exim*') ? 'active' : '' !!}">
                          <i class="fa fa-university nav-icon"></i>
                          <p>Exim</p>
                        </a>
                      </li>
                    @endif


                    @if (in_array(auth()->user()->role,['ADM','USR1'])) 
                      <li class="nav-item">
                        <a href="{!!route('user')!!}" class="nav-link {!! Request::is('admin/user*') ? 'active' : '' !!}">
                          <i class="fa fa-user nav-icon"></i>
                          <p>User</p>
                        </a>
                      </li>
                    @endif

                    @if (in_array(auth()->user()->role,['ADM','USR1'])) 
                      <li class="nav-item">
                        <a href="{!!route('divisi')!!}" class="nav-link {!! Request::is('admin/divisi*') ? 'active' : '' !!}">
                          <i class="fa fa-university nav-icon"></i>
                          <p>Divisi</p>
                        </a>
                      </li>
                    @endif

                    @if (in_array(auth()->user()->role,['ADM','USR1'])) 
                      <li class="nav-item">
                        <a href="{!!route('departemen')!!}" class="nav-link {!! Request::is('admin/departemen*') ? 'active' : '' !!}">
                          <i class="fa fa-building nav-icon"></i>
                          <p>Departemen</p>
                        </a>
                      </li>
                    @endif

                    @if (in_array(auth()->user()->role,['ADM','USR1'])) 
                      <li class="nav-item">
                        <a href="{!!route('param')!!}" class="nav-link {!! Request::is('admin/param') ? 'active' : '' !!}">
                          <i class="fa fa-book nav-icon"></i>
                          <p>Parameter</p>
                        </a>
                      </li>
                    @endif

                    @if (in_array(auth()->user()->role,['ADM','USR'])) 
                      <li class="nav-item">
                        <a href="{!!route('blank')!!}" class="nav-link {!! Request::is('blank') ? 'active' : '' !!}">
                          <i class="fa fa-cube nav-icon"></i>
                          <p>Blank</p>
                        </a>
                      </li>
                    @endif
                  </ul>
                </li>
              @endif

            {{-- Training --}}
            @if (in_array(auth()->user()->role,['ADM'])) 
              <li class="nav-item has-treeview {!! Request::is(['training','training/*']) ? 'menu-open' : '' !!}">
                <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-book"></i>
                  <p>
                    Training
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{!!route('training')!!}" class="nav-link {!! Request::is('training/training') ? 'active' : '' !!}">
                      <i class="fa fa-cube nav-icon"></i>
                      <p>Input Training</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{!!route('traininglist')!!}" class="nav-link {!! Request::is('training/traininglist') ? 'active' : '' !!}">
                      <i class="fa fa-cube nav-icon"></i>
                      <p>Peserta Training</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{!!route('blank')!!}" class="nav-link {!! Request::is('blank') ? 'active' : '' !!}">
                      <i class="fa fa-cube nav-icon"></i>
                      <p>Survey</p>
                    </a>
                  </li>
                </ul>
              </li>
            @endif

            {{-- Program Kerja--}}
            @if (in_array(auth()->user()->role,['ADM','USR'])) 
              <li class="nav-item has-treeview {!! Request::is(['proker','job/proker*']) ? 'menu-open' : '' !!}">
                <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-list-alt"></i>
                  <p>
                    Program Kerja
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  @if (in_array(auth()->user()->role,['ADM','USR'])) 
                    <li class="nav-item">
                      <a href="{!!route('proker')!!}" class="nav-link {!! Request::is('job/proker*') ? 'active' : '' !!}">
                        <i class="fa fa-briefcase nav-icon"></i>
                        <p>Proker</p>
                      </a>
                    </li>
                    @endif
                  </ul>
              </li>
            @endif
          
            <li class="nav-item">
              <a href="/logout" class="nav-link">
                <i class="fa fa-window-close nav-icon"></i>
                <p>Logout</p>
              </a>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>