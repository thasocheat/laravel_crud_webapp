<nav class="navbar navbar-expand-lg navbar-fixed navbar-blue">
  <div class="navbar-inner">
    <div class="navbar-intro justify-content-xl-between">
      <button type="button" class="btn btn-burger burger-arrowed static collapsed ml-2 d-flex d-xl-none" data-toggle-mobile="sidebar" data-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle sidebar">
        <span class="bars"></span>
      </button><!-- mobile sidebar toggler button -->
      <a class="navbar-brand text-white" href="#">
        <img height="48" src="{{asset('camtaxi_logo_white.webp')}}" alt="">
      </a><!-- /.navbar-brand -->
      <button type="button" class="btn btn-burger mr-2 d-none d-xl-flex" data-toggle="sidebar" data-target="#sidebar" aria-controls="sidebar" aria-expanded="true" aria-label="Toggle sidebar">
        <span class="bars"></span>
      </button><!-- sidebar toggler button -->
    </div><!-- /.navbar-intro -->
    <div class="navbar-content">
      <button class="navbar-toggler py-2" type="button" data-toggle="collapse" data-target="#navbarSearch" aria-controls="navbarSearch" aria-expanded="false" aria-label="Toggle navbar search">
        <i class="fa fa-search text-white text-90 py-1"></i>
      </button><!-- mobile #navbarSearch toggler -->
      <div class="collapse navbar-collapse navbar-backdrop" id="navbarSearch">
        <form class="d-flex align-items-center ml-lg-4 py-1" data-submit="dismiss">
          <i class="fa fa-search text-white d-none d-lg-block pos-rel"></i>
          <input type="text" class="navbar-input mx-3 flex-grow-1 mx-md-auto pr-1 pl-lg-4 ml-lg-n3 py-2 autofocus" placeholder="SEARCH ..." aria-label="Search" />
        </form>
      </div>
    </div><!-- .navbar-content -->
    <!-- mobile #navbarMenu toggler button -->
    <button class="navbar-toggler ml-1 mr-2 px-1" type="button" data-toggle="collapse" data-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navbar menu">
      <span class="pos-rel">
            <img class="border-2 brc-white-tp1 radius-round" width="36" src="{{asset('backend2')}}/assets/image/avatar/avatar6.jpg" alt="Jason's Photo">
            <span class="bgc-warning radius-round border-2 brc-white p-1 position-tr mr-n1px mt-n1px"></span>
      </span>
    </button>
    <div class="navbar-menu collapse navbar-collapse navbar-backdrop" id="navbarMenu">
      <div class="navbar-nav">
        <ul class="nav navbar-nav menu_nav ml-auto">
          <li class="nav-item submenu dropdown">
              <a   href="#"
              class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
              aria-haspopup="true" aria-expanded="false" >
              <?php  $flag = app()->getlocale(); ?>
              <img src="{{asset('images/flags/'.$flag.'.png')}}" class="img-flag" alt="" width="32" height="18">
              &nbsp;{{ strtoupper($flag) }}
              </a >
              <ul class="dropdown-menu">
              <li class="nav-item">
                  <a class="nav-link" href="{{url('lang/kh')}}">
                  <img src="{{asset('images/flags/kh.png')}}" class="img-flag" alt="" width="32" height="18">
                  <span> Khmer</span>
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="{{url('lang/en')}}">
                  <img src="{{asset('images/flags/en.png')}}" class="img-flag" alt="" width="32" height="18">
                  English
                  </a>
              </li>
              </ul>
          </li>
        </ul>
        <ul class="nav">

          <li class="nav-item dropdown order-first order-lg-last">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
              <img id="id-navbar-user-image" class="d-none d-lg-inline-block radius-round border-2 brc-white-tp1 mr-2 w-6" src="{{asset('backend2')}}/assets/image/avatar/avatar6.jpg" alt="Jason's Photo">
              <span class="d-inline-block d-lg-none d-xl-inline-block">
                        <span class="text-90" id="id-user-welcome">Welcome,</span>
              <span class="nav-user-name">{{ Auth::user()->name }}</span>
              </span>
              <i class="caret fa fa-angle-down d-none d-xl-block"></i>
              <i class="caret fa fa-angle-left d-block d-lg-none"></i>
            </a>
            <div class="dropdown-menu dropdown-caret dropdown-menu-right dropdown-animated brc-primary-m3 py-1">
              <div class="d-none d-lg-block d-xl-none">
                <div class="dropdown-header">
                  Welcome, {{ Auth::user()->name }}
                </div>
                <div class="dropdown-divider"></div>
              </div>
              <div class="dropdown-clickable px-3 py-25 bgc-h-secondary-l3 border-b-1 brc-secondary-l2">
                <!-- online/offline toggle -->
                <div class="d-flex justify-content-center align-items-center tex1t-600">
                  <label for="id-user-online" class="text-grey-d1 pt-2 px-2">offline</label>
                  <input type="checkbox" class="ace-switch ace-switch-sm text-grey-l1 brc-green-d1" id="id-user-online" />
                  <label for="id-user-online" class="text-green-d1 text-600 pt-2 px-2">online</label>
                </div>
              </div>
              <a class="mt-1 dropdown-item btn btn-outline-grey bgc-h-primary-l3 btn-h-light-primary btn-a-light-primary" href="html/page-profile.html">
                <i class="fa fa-user text-primary-m1 text-105 mr-1"></i>
                Profile
              </a>
              <a class="mt-1 dropdown-item btn btn-outline-grey bgc-h-primary-l3 btn-h-light-primary btn-a-light-primary" href="{{route('admin.home')}}">
                <i class="fa fa-user text-primary-m1 text-105 mr-1"></i>
                Go To Front Page
              </a>
              <a class="dropdown-item btn btn-outline-grey bgc-h-success-l3 btn-h-light-success btn-a-light-success" href="#" data-toggle="modal" data-target="#id-ace-settings-modal">
                <i class="fa fa-cog text-success-m1 text-105 mr-1"></i>
                Settings
              </a>
              <div class="dropdown-divider brc-primary-l2"></div>
              <a class="dropdown-item btn btn-outline-grey bgc-h-secondary-l3 btn-h-light-secondary btn-a-light-secondary"
                  href="{{ route('logout') }}" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  <i class="fa fa-power-off text-warning-d1 text-105 mr-1"></i>
                  {{trans('global.logout')}}
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                  </form>
              </a>
            </div>
          </li><!-- /.nav-item:last -->
        </ul><!-- /.navbar-nav menu -->
      </div><!-- /.navbar-nav -->
    </div><!-- /#navbarMenu -->
  </div><!-- /.navbar-inner -->
</nav>
