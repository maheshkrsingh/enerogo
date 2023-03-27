<!DOCTYPE html>
<html lang="en">
    <head>
       
        <title>Module Admin</title>

      @include('admin::includes.head')

    </head>
    <body>
        <div class="container-scroller">
        
              @include('admin::includes.navbar')
            <div class="container-fluid page-body-wrapper">
               @include('admin::includes.sidenavbar')
              <!-- partial -->
              <div class="main-panel">
              @yield('content')
              <br/>
              <br/>
              @include('admin::includes.footer')
              </div>
              <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
          </div>
    
        <!--Javascript Plugin-->
        @yield('scripts')
        @include('admin::includes.javascriptplugin')
        @livewireScripts
        @stack('script')  
    </body>
</html>
