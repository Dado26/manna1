<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>@yield('title', 'Manna - Baza Članova crkve')</title>
        <meta name="description" content="Baza Članova crkve">

        <!--bootstrap -->
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('css/sidebar.css')}}" rel="stylesheet">
        <link href="{{asset('css/app.css')}}" rel="stylesheet">
        <!--Font Awesome -->
        <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">

        @yield('style')
    </head>
    <body>
        @include('partials.navigation')
      
        <div id="wrapper" class="{{ !auth()->check() ? : 'toggled' }}">
            @include('partials.sidebar')

            @yield('content')

            @yield('auth')
        </div>

        <!-- Footer -->
        <footer class="footer bg-dark">
            <div class="container" >
                <p class="text-muted">Website created by C.D</p>
            </div>
        </footer>

    <!-- Bootstrap core JavaScript -->
                
    <script src="{{asset('js/app.js')}}"></script>
    @yield('script')
    
     <script>
       $(document).ready(function(){        
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");        
    });
    });
     </script>

  </body>

</html>
