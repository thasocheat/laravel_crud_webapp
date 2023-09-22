<div id="sidebar" class="sidebar sidebar-fixed expandable sidebar-light">
  <div class="sidebar-inner">
    <div class="ace-scroll flex-grow-1" data-ace-scroll="{}">

      <ul class="nav has-active-border active-on-right">
        {{-- Dashboard --}}
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-tachometer-alt"></i>
            <span class="nav-text fadeable">
           <span>Dashboard</span>
            </span>
          </a>
          <b class="sub-arrow"></b>
        </li>

        {{-- Vehicles --}}
        <li class="nav-item">
            <a href="#" class="nav-link dropdown-toggle collapsed">
              <i class="nav-icon fas fa-fw fa-bus-alt"></i>

              <span class="nav-text fadeable">
               <span>Manage Department</span>
              </span>
              <b class="caret fa fa-angle-left rt-n90"></b>
            </a>
            <div class="hideable submenu collapse">
              <ul class="submenu-inner">

                <li class="nav-item">
                  <a href="{{route('department.index')}}" class="nav-link">
                    <span class="nav-text">
                   <span>View Departments</span>
                    </span>
                  </a>
                </li>

              </ul>
            </div>
            <b class="sub-arrow"></b>
        </li>
        

      </ul>
    </div><!-- /.sidebar scroll -->

    <div class="sidebar-section">
      <div class="sidebar-section-item fadeable-bottom">
        <div class="fadeinable">
          <!-- shows this when collapsed -->
          <div class="pos-rel">
            <img alt="Alexa's Photo" src="{{asset('backend2')}}/assets/image/avatar/avatar3.jpg" width="42" class="px-1px radius-round mx-2 border-2 brc-default-m2" />
            <span class="bgc-success radius-round border-2 brc-white p-1 position-tr mr-1 mt-2px"></span>
          </div>
        </div>

        <div class="fadeable hideable w-100 bg-transparent shadow-none border-0">
          <!-- shows this when full-width -->
          <div id="sidebar-footer-bg" class="d-flex align-items-center bgc-white shadow-sm mx-2 mt-2px py-2 radius-t-1 border-x-1 border-t-2 brc-primary-m3">
            <div class="d-flex mr-auto py-1">
              <div class="pos-rel">
                <img alt="Alexa's Photo" src="{{asset('backend2')}}/assets/image/avatar/avatar3.jpg" width="42" class="px-1px radius-round mx-2 border-2 brc-default-m2" />
                <span class="bgc-success radius-round border-2 brc-white p-1 position-tr mr-1 mt-2px"></span>
              </div>

              <div>
                <span class="text-blue-d1 font-bolder">
                    @auth
                        {{ Auth::user()->name }}
                    @endauth
                </span>
                <div class="text-80 text-grey">
                  Admin
                </div>
              </div>
            </div>

            <a href="#" class="d-style btn btn-outline-primary btn-h-light-primary btn-a-light-primary border-0 p-2 mr-2px ml-4" title="Settings" data-toggle="modal" data-target="#id-ace-settings-modal">
              <i class="fa fa-cog text-150 text-blue-d2 f-n-hover"></i>
            </a>

            {{-- <a href="{{route('logout')}}" class="d-style btn btn-outline-orange btn-h-light-orange btn-a-light-orange border-0 p-2 mr-1" title="Logout">
              <i class="fa fa-sign-out-alt text-150 text-orange-d2 f-n-hover"></i>
            </a> --}}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
