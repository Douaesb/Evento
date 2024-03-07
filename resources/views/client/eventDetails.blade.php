<x-app-layout>
    <div class="min-h-screen flex flex-col sm:flex-row bg-gray-100">
        @include('layouts.navigation')
        <div class="flex justify-center items-center w-full">
            <div
                class="flex justify-center items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl w-full">
                <div class="flex flex-col justify-between p-4 leading-normal">
                    <div class="flex items-center mb-2">
                        <a href=""
                            class="inline-flex items-center justify-center h-8 w-8 text-lg text-indigo-500"><i
                                class="bx bx-arrow-back"></i></a>
                        <h4 class="ml-2 text-xl text-gray-500">Categorie : {{$event->categorie->nom}}</h4>
                    </div>
                    <h5
                        class=" flex justify-center mb-2= text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        Title : {{$event->titre}} </h5>

                    <p class="mb-3 font-normal text-gray-700">{{$event->description}} </p>
                    <div class="flex items-center justify-between gap-4">
                        <div class="flex items-center gap-2 mt-3">
                            <span class="inline-flex  items-center justify-end h-8 w-8 text-lg text-indigo-500"><i
                                    class="bx bx-user"></i></span>
                            <p class="ml-2 text-indigo-500">{{$event->user->name}} </p>
                        </div>
                        <div class="flex items-center text-green-500 gap-2 mt-3">
                            <span class="ml- leading-none text-gray-600">Crée le :</span>
                            <span class="leading-none"> {{$event->date}}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
