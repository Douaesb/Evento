<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-cover" style="background-image: url('../img/bckevent.jpg');">
    {{-- <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white"> --}}
    @if (Route::has('login'))
        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10  ">
            @auth
                @if (auth()->user()->role == 'admin')
                    <a href="{{ url('/homeA') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                @endif
            @else
                <a href="{{ route('login') }}"
                    class="font-semibold text-white border-2 border-blue-600 rounded-lg p-2 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                    in</a>

                @if (Route::has('registerCli'))
                    <a href="{{ route('registerCli') }}"
                        class="ml-4 font-semibold text-white border-2 bg-yellow-400/50 rounded-lg p-2 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                @endif
            @endauth
        </div>
    @endif
    <div class="flex justify-center items-center">
        <div class="max-w-7xl w-full m-auto py-16 pt-20">
            <div class="grid lg:grid-cols-2 justify-center items-center gap-10 m-20">
                <div>
                    <h1 class="md:text-5xl text-4xl text-white font-extrabold mb-6 md:!leading-[55px]">Welcome to
                        Evento, keep in touch
                    </h1>

                    <div class="flex flex-wrap gap-y-4 gap-x-8 mt-8">
                        <button
                            class='bg-blue-400 flex items-center transition-all font-semibold rounded-md px-1 py-1 w-fit'>
                            <div class="bg-blue-300 p-1">
                                <div class=" flex bg-blue-200 p-2">
                                    <a href="{{ route('login') }}">Get
                                        started</a>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-[14px] fill-current ml-2"
                                        viewBox="0 0 492.004 492.004">
                                        <path
                                            d="M484.14 226.886 306.46 49.202c-5.072-5.072-11.832-7.856-19.04-7.856-7.216 0-13.972 2.788-19.044 7.856l-16.132 16.136c-5.068 5.064-7.86 11.828-7.86 19.04 0 7.208 2.792 14.2 7.86 19.264L355.9 207.526H26.58C11.732 207.526 0 219.15 0 234.002v22.812c0 14.852 11.732 27.648 26.58 27.648h330.496L252.248 388.926c-5.068 5.072-7.86 11.652-7.86 18.864 0 7.204 2.792 13.88 7.86 18.948l16.132 16.084c5.072 5.072 11.828 7.836 19.044 7.836 7.208 0 13.968-2.8 19.04-7.872l177.68-177.68c5.084-5.088 7.88-11.88 7.86-19.1.016-7.244-2.776-14.04-7.864-19.12z"
                                            data-original="#000000" />
                                    </svg>
                                </div>
                            </div>

                        </button>
                    </div>
                </div>
                <div
                    class=" flex justify-center max-lg:mt-12 h-80 w-80 rounded-full overflow-hidden shadow-lg border-2 border-blue-600">
                    <img src="../../img/eventH.jpg" alt="banner img" class="w-full h-full object-cover rounded-full" />
                </div>
            </div>
        </div>
    </div>


    {{-- </div> --}}
</body>

</html>
