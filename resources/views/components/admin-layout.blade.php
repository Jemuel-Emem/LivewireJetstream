<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

         {{-- Bootstrap Scripts --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>
    <script src="./TW-ELEMENTS-PATH/dist/js/index.min.js"></script>


        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link rel="stylesheet" href="{{  asset('sweetalert2/sweetalert2.min.css') }}">
        <script src="/path/to/sweetalert2.min.js"></script>
        <link rel="stylesheet" href="/path/to/sweetalert2.min.css">

          <script>
          window.addEventListener('show-delete-confirmation', event =>{
          Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
            Swal.fire(
              Livewire.emit('deleteConfirmed')
            )
          }
        })
        });

         window.addEventListener('product-deleted', event =>{
            Swal.fire(
              'Deleted!',
              'The data has been deleted.',
              'success'
            )
           });

            </script>

        @livewireStyles
    </head>
    <body class="font-sans antialiased">
                        <div>
                        {{-- //dire ka gali nag butang sang layout niya ? // oo. dira muna tnan ibutang --}}
                        <nav class=" border-gray-200  dark:bg-gray-800 dark:border-gray-700 bg-blue-700 w-screen">
                        <div class=" flex flex-wrap items-center justify-between mx-auto">
                        <a href="practice" class="flex items-center">
                        <img src="https://flowbite.com/docs/images/logo.svg" class="h-6 mr-3 sm:h-10" alt="Flowbite Logo" />
                        <span class="ml-2 text-light  text-2xl">Welcome! {{ Auth::user()->name }}</span>
                        </a>
                        <button data-collapse-toggle="navbar-solid-bg" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-solid-bg" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                        </button>
                        <div class="hidden w-full md:block md:w-auto" id="navbar-solid-bg">
                        <ul class="flex flex-col pt-3 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-transparent dark:bg-gray-800 md:dark:bg-transparent dark:border-gray-700">
                        <li>
                        <a href="" class="block  text-light text-xl no-underline" style="text-decoration: none;"><i class="ri-list-ordered"></i></a>
                        </li>
                        <li>
                        <a href="" class="block  mr-8 text-light text-xl " style="text-decoration: none;">Sales</a>
                        </li>

                        <div class="pr-2 py-2">
                        <a class=" text-light p-1" style="text-decoration:none;" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                        </form>
                        </div>

                        </ul>
                        </div>
                        </div>
                        </nav>

                        </div>

                        <!-- Page Content -->
                        <main class="p-10">
                        {{ $slot }}
                        {{-- tapos ning slot ang gamiton mo para magamit mo ang layout sa iban nga view --}}
                       </main>
                    </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
