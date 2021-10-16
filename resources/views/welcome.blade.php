<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link href="https://unpkg.com/tailwindcss@2.2.4/dist/tailwind.min.css" rel="stylesheet">

        <title>Laravel</title>
    </head>
    <body class="h-screen overflow-hidden flex items-center justify-center" style="background: #edf2f7;">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">


            <div class="flex flex-wrap place-items-top h-screen">
                <section class="relative mx-auto">
                    <!-- navbar -->
                  <nav class="flex justify-between bg-gray-900 text-white w-screen">
                    <div class="px-5 xl:px-12 py-6 flex w-full items-center">
                      <a class="text-3xl font-bold font-heading" href="#">
                        <!-- <img class="h-9" src="logo.png" alt="logo"> -->
                        Logo Here.
                      </a>
                      <!-- Nav Links -->
                      <ul class="hidden md:flex px-4 mx-auto font-semibold font-heading space-x-12">
                        <li><a class="hover:text-gray-200" href="#">Home</a></li>
                        <li><a class="hover:text-gray-200" href="#">Catagory</a></li>
                        @if (Route::has('login'))
                        @auth


                        <li><a class="hover:text-gray-200" href="{{ url('/dashboard') }}">Dashboard</a></li>
                        @else
                        <li><a class="hover:text-gray-200" href="{{ route('login') }}">Log in</a></li>
                        <li><a class="hover:text-gray-200" href="{{ route('register') }}">Registrar</a></li>
                        @endif
                        @endauth



                      </ul>
                      <!-- Header Icons -->
                      <div class="hidden xl:flex items-center space-x-5 items-center">


                        <a class="flex items-center hover:text-gray-200" href="#">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                          </svg>

                        </a>
                        <!-- Sign In / Register      -->
                        <a class="flex items-center hover:text-gray-200" href="#">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                          </svg>
                        </a>


                      </div>
                    </div>
                    <!-- Responsive navbar -->
                    <a class="xl:hidden flex mr-6 items-center" href="#">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                      </svg>
                      <span class="flex absolute -mt-5 ml-4">
                        <span class="animate-ping absolute inline-flex h-3 w-3 rounded-full bg-pink-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-3 w-3 bg-pink-500">
                        </span>
                      </span>
                    </a>
                    <a class="navbar-burger self-center mr-12 xl:hidden" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </a>
                  </nav>

                </section>
                <div class="relative m-3 flex flex-wrap mx-auto justify-center">

                    <div class="relative max-w-sm min-w-[340px] bg-white shadow-md rounded-3xl p-2 mx-1 my-3 cursor-pointer">
                      <div class="overflow-x-hidden rounded-2xl relative">
                        <img class="h-40 rounded-2xl w-full object-cover" src="https://docemalu.vteximg.com.br/arquivos/ids/174970-1000-1000/7078-1.jpg?v=636396036444800000">
                        <p class="absolute right-2 top-2 bg-white rounded-full p-2 cursor-pointer group">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:opacity-50 opacity-70" fill="none" viewBox="0 0 24 24" stroke="black">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                          </svg>
                        </p>
                      </div>
                      <div class="mt-4 pl-2 mb-2 flex justify-between ">
                        <div>
                          <p class="text-lg font-semibold text-gray-900 mb-0">Bala Yogurte 600gm</p>
                          <p class="text-md text-gray-800 mt-0">R$ 4,50</p>
                        </div>
                        <div class="flex flex-col-reverse mb-1 mr-4 group cursor-pointer">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:opacity-70" fill="none" viewBox="0 0 24 24" stroke="gray">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                          </svg>
                        </div>
                      </div>
                    </div>

                    <div class="relative max-w-sm min-w-[340px] bg-white shadow-md rounded-3xl p-2 mx-1 my-3 cursor-pointer">
                      <div class="overflow-x-hidden rounded-2xl relative">
<<<<<<< HEAD
                        <img class="h-40 rounded-2xl w-full object-cover" src="storage\app\public\produtos\amendoim.png">
=======
                        <img class="h-40 rounded-2xl w-full object-cover" src="storage\app\public\amendoim.png">
>>>>>>> 246e67943c189e8b0b4abed841cb6beabb2b4b6d
                        <p class="absolute right-2 top-2 bg-white rounded-full p-2 cursor-pointer group">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:opacity-50 opacity-70" fill="none" viewBox="0 0 24 24" stroke="black">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                          </svg>
                        </p>
                      </div>
                      <div class="mt-4 pl-2 mb-2 flex justify-between ">
                        <div>
                          <p class="text-lg font-semibold text-gray-900 mb-0">Amendoim Japonês</p>
                          <p class="text-md text-gray-800 mt-0">R$ 5</p>
                        </div>
                        <div class="flex flex-col-reverse mb-1 mr-4 group cursor-pointer">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:opacity-70" fill="none" viewBox="0 0 24 24" stroke="gray">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                          </svg>
                        </div>
                      </div>
                    </div>

                  </div>
              </div>





            </div>
        </div>
    </body>
</html>
