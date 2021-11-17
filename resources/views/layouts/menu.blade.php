<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://unpkg.com/tailwindcss@2.2.4/dist/tailwind.min.css" rel="stylesheet">
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}" ></script>

    <script src="{{ asset('js/jquery.mask.js') }}" ></script>

    <title>@yield('title')</title>
</head>

<body class="h-screen overflow-hidden flex items-center justify-center" style="background: #edf2f7;">
    <div
        {{-- parte que fica os produtos --}}
        class="relative flex items-top justify-center min-h-screen bg-grey-300 dark:bg-gray-900 sm:items-center py-4 sm:pt-0 overflow-y-auto	overflow-y: auto;">
        {{-- fim da parte q fica os produtos --}}
        <div class="flex flex-wrap place-items-top h-screen">
            <section class="relative mx-auto">
                <!-- navbar -->
                <nav class="flex justify-between bg-green-500	--tw-bg-opacity: 1;
                background-color: rgba(16, 185, 129, var(--tw-bg-opacity)); text-white w-screen">

                    <div class="px-5 xl:px-12 py-6 flex w-full items-center">

                        <a class="text-3xl font-bold font-heading" href="/">
                            <img class="h-16 w-40" src="\images\rappilogo.png" alt="logo"></a>
                        <!-- Nav Links -->
                        <ul class="hidden md:flex px-4 mx-auto font-semibold font-heading space-x-12">
                            <li><a class="hover:text-gray-200" href="/">Home</a></li>
                            <li><a class="hover:text-gray-200" href="#">Categorias</a></li>


                            @if (Route::has('login'))
                                @auth


                                @if (Auth::user()->nivel < 10)
                                    <li><a class="hover:text-gray-200" href="{{ url('/cadastrar/produtos') }}">Cadastrar Produto</a></li>
                                    <li><a class="hover:text-gray-200" href="{{ url('/p/painel') }}">Painel de controle</a></li>
                                    <li><a class="hover:text-gray-200" href="{{ url('/dashboard') }}">Dashboard</a></li>
                                    @endif
                                @else
                                    <li><a class="hover:text-gray-200" href="{{ route('login') }}">Log in</a></li>
                                    <li><a class="hover:text-gray-200" href="{{ route('register') }}">Registrar</a></li>
                                @endif
                            @endauth
                            <li><form action="/" method="get">
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"type="search" name="search" id="search" placeholder="Pesquisar" > </form></li>



                        </ul>
                        <!-- Header Icons -->
                        <div class="hidden xl:flex items-center space-x-5 items-center">


                            <a class="flex items-center hover:text-gray-200" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>

                            </a>
                            <!-- Sign In / Register      -->



                        </div>
                    </div>
                    <!-- Responsive navbar -->
                    <a class="xl:hidden flex mr-6 items-center" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:text-gray-200" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <span class="flex absolute -mt-5 ml-4">
                            <span
                                class="animate-ping absolute inline-flex h-3 w-3 rounded-full bg-pink-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-3 w-3 bg-pink-500">
                            </span>
                        </span>
                    </a>



                </nav>
                @yield('content')
        </div>

        </section>


    </div>


</body>

</html>
