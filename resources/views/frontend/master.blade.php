@include('frontend.layouts.top-header')

    @include('frontend.layouts.header-area')
    @include('frontend.layouts.site-brand')
    @include('frontend.layouts.menu')

    @yield('main-content')
    
    @include('frontend.layouts.top-footer')

@include('frontend.layouts.footer')