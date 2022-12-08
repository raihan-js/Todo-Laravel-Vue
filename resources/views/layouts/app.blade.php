<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @vite('resources/css/app.css')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
</head>
<body>
    <div>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <div class="lg:w-0 lg:flex-1">
                    <a class="" href="{{ url('/') }}"><img class="h-8 w-auto sm:h-10" src="https://tailwindui.com/img/logos/workflow-mark-on-white.svg" alt="Workflow" /></a>
                  </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="hidden items-center justify-end md:flex md:flex-1 lg:w-0" id="navbarSupportedContent">

                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))

                                    <a class="whitespace-nowrap text-base font-medium text-gray-500 hover:text-gray-900" href="{{ route('login') }}">{{ __('Login') }}</a>

                            @endif

                            @if (Route::has('register'))

                                    <a class="ml-8 inline-flex items-center justify-center whitespace-nowrap rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-indigo-700" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>                            
                            @endif
                        @else
                        <!-- Dropdown profile  -->
                        <div class="hidden md:block w-full md:w-auto" id="mobile-menu">
                            <ul class="flex-col md:flex-row flex md:space-x-8 mt-4 md:mt-0 md:text-sm md:font-medium">
                                    <li>
                                        
                                        <div class="py-1">
                                            <a href="{{ route('logout') }}" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">{{ __('Logout') }}
                                            </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                 @csrf
                                                </form>
                                        </div>
                                        
                                    </li>
                            </ul>
                        </div>
                        @endguest
                    </ul>
                </div>
            </div>
            
        </nav>
    </div> 
    <div>
        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
