<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="font-[sans-serif] text-[#333] bg-white flex items-center justify-center md:h-screen p-4">
        <div class="shadow-blue-400 shadow-md max-w-6xl rounded-md p-6 border-2 border-blue-400">

            <div class="grid md:grid-cols-2 items-center gap-8">
                <div class="max-md:order-1">
                    <img src="../../img/loginimg.jpeg" class="lg:w-11/12 w-full object-cover" alt="login-image" />
                </div>
                <form class="max-w-md w-full mx-auto" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-12">
                        <h3 class="text-4xl font-extrabold text-white">Sign in</h3>
                    </div>
                    @if (session('banned_message'))
                       
                        <div id="alert-border-2" class="flex items-center p-4 mb-4 text-red-800 border-t-4 border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800" role="alert">
                            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                              <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                            </svg>
                            <div class="ms-3 text-sm font-medium">
                                {{ session('banned_message') }}
                            </div>
                        </div>
                    @endif  
                    <div>
                        <div class="relative flex items-center">
                            <input name="email" type="text" required
                                class="w-full text-sm border-b rounded-sm border-gray-300 focus:border-blue-900 px-2 py-3 outline-none"
                                placeholder="Enter email" :value="old('email')" required autofocus
                                autocomplete="username" />
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb"
                                class="w-[18px] h-[18px] absolute right-2" viewBox="0 0 682.667 682.667">
                                <defs>
                                    <clipPath id="a" clipPathUnits="userSpaceOnUse">
                                        <path d="M0 512h512V0H0Z" data-original="#000000"></path>
                                    </clipPath>
                                </defs>
                                <g clip-path="url(#a)" transform="matrix(1.33 0 0 -1.33 0 682.667)">
                                    <path fill="none" stroke-miterlimit="10" stroke-width="40"
                                        d="M452 444H60c-22.091 0-40-17.909-40-40v-39.446l212.127-157.782c14.17-10.54 33.576-10.54 47.746 0L492 364.554V404c0 22.091-17.909 40-40 40Z"
                                        data-original="#000000"></path>
                                    <path
                                        d="M472 274.9V107.999c0-11.027-8.972-20-20-20H60c-11.028 0-20 8.973-20 20V274.9L0 304.652V107.999c0-33.084 26.916-60 60-60h392c33.084 0 60 26.916 60 60v196.653Z"
                                        data-original="#000000"></path>
                                </g>
                            </svg>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                    </div>
                    <div class="mt-8">
                        <div class="relative flex items-center">
                            <input name="password" type="password" required
                                class="w-full text-sm border-b rounded-sm border-gray-300 focus:border-blue-900 px-2 py-3 outline-none"
                                placeholder="Enter password" required autocomplete="current-password" />
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb"
                                class="w-[18px] h-[18px] absolute right-2 cursor-pointer" viewBox="0 0 128 128">
                                <path
                                    d="M64 104C22.127 104 1.367 67.496.504 65.943a4 4 0 0 1 0-3.887C1.367 60.504 22.127 24 64 24s62.633 36.504 63.496 38.057a4 4 0 0 1 0 3.887C126.633 67.496 105.873 104 64 104zM8.707 63.994C13.465 71.205 32.146 96 64 96c31.955 0 50.553-24.775 55.293-31.994C114.535 56.795 95.854 32 64 32 32.045 32 13.447 56.775 8.707 63.994zM64 88c-13.234 0-24-10.766-24-24s10.766-24 24-24 24 10.766 24 24-10.766 24-24 24zm0-40c-8.822 0-16 7.178-16 16s7.178 16 16 16 16-7.178 16-16-7.178-16-16-16z"
                                    data-original="#000000"></path>
                            </svg>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                    </div>
                    <div class="flex items-center justify-between gap-2 mt-6">
                        <div class="flex items-center">
                            <input name="remember_me" id="remember_me" type="checkbox"
                                class="h-4 w-4 shrink-0 text-blue-200 focus:ring-blue-500 border-gray-300 rounded" />
                            <label for="remember-me" class="ml-3 block text-sm text-white">
                                Remember me
                            </label>
                        </div>
                        <div>
                            @if (Route::has('password.request'))
                                <a class="text-blue-200 text-sm hover:underline" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif
                        </div>
                    </div>
                    <div class="mt-12">
                        <button type="submit"
                            class="w-full shadow-xl py-2.5 px-4 text-sm font-semibold rounded-full text-white bg-blue-900 hover:bg-blue-800 focus:outline-none">
                            Login
                        </button>
                        <p class="text-sm text-white text-center mt-8">Don't have an account ? <a href="{{ route('registerOrg') }}"
                                class="text-blue-200 font-semibold hover:underline ml-1 whitespace-nowrap">Register
                                here</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
