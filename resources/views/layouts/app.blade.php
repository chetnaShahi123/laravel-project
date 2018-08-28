<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('includes.head')
</head>
<body>
    <div id="app">
 
        
        @include('includes.header')
        @include('flash-message')
        @yield('content')

         @include('includes.footer')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script>
            //redirect to specific tab
            @include('myJSfile')
    </script>
    
</body>
</html>
