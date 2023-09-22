@include('layouts.partials.head')

  <body>

    <div class="body-container">
      @include('layouts.partials.top_menu')
      <div class="main-container bgc-white">
        @guest
            @if (Route::has('login')) @endif
        @else
          @include('layouts.partials.left_sidebar')
        @endguest
        <div role="main" class="main-content">
          <div class="page-content container-fluid container-plus">
            @yield('breadcrumb')
            @yield('admin_content')
          </div>
          @include('layouts.partials.footer')
        </div>
        @include('layouts.partials.ace_setting')
      </div>
    </div>
    @include('layouts.partials.script')
  </body>

</html>
