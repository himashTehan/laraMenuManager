<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
</head>

<body>

    <div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
        <header class="masthead mb-auto">
                <nav class="nav nav-masthead justify-content-center">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/home') }}" class="nav-link">Home</a>
                        @else
                            <a href="{{ route('login') }}" class="nav-link">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="nav-link">Register</a>
                            @endif
                        @endauth
                    @endif
                </nav>
        </header>

        <main role="main" class="inner cover">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img class="d-block w-100" src="{{ asset('img/cover.jpg') }}" alt="First slide">
                  </div>
                </div>
              </div>
              <br>
            <h1 class="cover-heading">Lorem ipsum dolor sit amet</h1>
            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus dictum gravida sem, nec
                bibendum urna tempus ac. Fusce magna ante, dictum ut luctus dapibus, interdum at lorem. Aliquam
                consequat eu urna ut ullamcorper. Suspendisse rutrum felis ac elit imperdiet, quis suscipit metus
                varius.</p>
            <p class="lead">
                <a href="#" class="btn btn-lg btn-light">Learn more</a>
            </p>
        </main>

        <footer class="mastfoot mt-auto">
            <div class="inner">
            </div>
        </footer>
    </div>
</body>

</html>
