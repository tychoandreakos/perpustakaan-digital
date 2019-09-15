 <!-- Navbar -->
 <!-- navbar-content -->
 <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
     <div class="container-fluid">
         <!-- Brand -->
         <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block"
             href="{{ route('home') }}">{{ (isset($title)) ? $title : 'Beranda' }}</a>
         <!-- Form -->
         <div class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
             <div class="form-group mb-0">
                 <div class="input-group input-group-alternative">
                     <div class="input-group-prepend">
                         <span class="input-group-text"><i class="fas fa-search"></i></span>
                     </div>
                     <input v-model="search" @keyup="searchHit" class="form-control" placeholder="Search" type="text">
                 </div>
             </div>
         </div>
         <!-- User -->
         <!-- Right Side Of Navbar -->
         <ul class="navbar-nav align-items-center d-none d-md-flex">
             <!-- Authentication Links -->
             @guest('admin')
             <li class="nav-item">
                 <a class="nav-link" href="{{route('admin.login')}}">{{ ucfirst(config('multiauth.prefix')) }} Login</a>
             </li>
             @else
             <li class="nav-item dropdown">
                 <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                     aria-expanded="false">
                     <div class="media align-items-center">
                         <span class="avatar avatar-sm rounded-circle">
                             {{-- <img alt="Image placeholder" src="{{ asset('img/theme/team-4-800x800.jpg') }}"> --}}
                         </span>
                         <div class="media-body ml-2 d-none d-lg-block">
                                <span class="mb-0 text-sm  font-weight-bold">
                             {{ auth('admin')->user()->name }} <span class="caret"></span>
                         </div>
                     </div>
                 </a>

                 <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                     <div class=" dropdown-header noti-title">
                         <h6 class="text-overflow m-0">Halo {{ auth('admin')->user()->name }}</h6>
                     </div>
                     <div class="dropdown-divider"></div>
                     @admin('super')
                     <a class="dropdown-item"
                         href="{{ route('admin.show') }}">{{ ucfirst(config('multiauth.prefix')) }}</a>
                     <a class="dropdown-item" href="{{ route('admin.roles') }}">Roles</a>
                     @endadmin
                     <a class="dropdown-item" href="{{ route('admin.password.change') }}">Change Password</a>
                     <a class="dropdown-item" href="/admin/logout" onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                         {{ __('Logout') }}
                     </a>
                     <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                         @csrf
                     </form>
                 </div>
             </li>
             @endguest
         </ul>
     </div>
 </nav>
 <!-- End Navbar -->
