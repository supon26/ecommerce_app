
@include('backend.includes.header')
@include('backend.includes.top-nav')
       
        <div id="layoutSidenav">
            @include('backend.includes.side-nav')
            <div id="layoutSidenav_content">
                <main>
                   @yield('main-section')
                </main>
                @include('backend.includes.copywrite')
            </div>
        </div>
 
@include('backend.includes.footer')