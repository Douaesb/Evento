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

<body class="antialiased ">
    {{-- <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white"> --}}
    @if (Route::has('login'))
        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10  ">
            @auth
                <a href="{{ url('/home') }}"
                    class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
            @else
                <a href="{{ route('login') }}"
                    class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                    in</a>

                @if (Route::has('registerCli'))
                    <a href="{{ route('registerCli') }}"
                        class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                @endif
            @endauth
        </div>
    @endif
    <div class="min-h-screen  px-4 w-full mx-auto sm:px-10">
        <div class="max-w-7xl w-full mx-auto py-16 pt-20">
            <div class="grid lg:grid-cols-2 justify-center items-center gap-10">
                <div>
                    <h1 class="md:text-5xl text-4xl text-blue-900 font-extrabold mb-6 md:!leading-[55px]">Weclome to Evento, keep in touch
                    </h1>
                    <div class="max-w-7xl mx-auto p-6 lg:p-8">
                        <div class="flex justify-start ">
                            <div class="text-black rounded-lg max-w-xl font-[sans-serif]">

                                <marquee class="text-4xl font-bold text-center mt-4 text-base font-italic"
                                    behavior="scroll" direction="left" scrollamount="3">
                                    You can assist events by reserving or even creating your own
                                </marquee>
                            </div>
                        </div>
                    </div>
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
                <div class="max-lg:mt-12 h-full">
                    <img src="../../img/loginimg.jpeg" alt="banner img" class="w-full h-full object-cover" />
                </div>
            </div>
        </div>
    </div>


    {{-- </div> --}}
</body>

</html>
