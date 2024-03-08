<x-app-layout>
    <div class="min-h-screen flex flex-col sm:flex-row bg-gray-100">

        @include('layouts.navigation')
        <div>

        </div>
        <div class="max-w-4xl mx-auto py-12 px-4 font-[sans-serif] text-[#333]">
            <div class="max-w-4xl mx-auto">
                <div class="bg-pink-100 rounded-lg p-10 border-2 border-pink-600">

                    <h2 class="text-4xl font-extrabold mb-12 text-center">Statistiques</h2>
                    <hr class="my-10 border border-pink-700">

                    <div class="grid md:grid-cols-3 sm:grid-cols-1 gap-x-20 gap-y-8">
                        <div class="mx-auto">
                            <div
                                class="w-28 h-28 bg-white flex items-center justify-center shrink-0 border-2 border-pink-700 rounded-full">
                                <h3 class="text-2xl font-extrabold">{{ $clientCount }}</h3>
                            </div>
                            <div class="text-center mt-4">
                                <p class="text-lg font-bold">Clients</p>
                            </div>
                        </div>
                        <div class="mx-auto">
                            <div
                                class="w-28 h-28 bg-white flex items-center justify-center shrink-0 border-2 border-pink-700 rounded-full">
                                <h3 class="ml-2 text-md text-blue-800 font-bold">{{ $mostActiveOrganisateur }}</h3>
                            </div>
                            <div class="text-center mt-4">
                                <p class="text-lg font-bold">Most Active <br> Organisateur</p>
                            </div>
                        </div>
                        <div class="mx-auto">
                            <div
                                class="w-28 h-28 bg-white flex items-center justify-center shrink-0 border-2 border-pink-700 rounded-full">
                                <h3 class="text-2xl font-extrabold">{{ $totalEvents }}</h3>
                            </div>
                            <div class="text-center mt-4">
                                <p class="text-lg font-bold">Total Events</p>
                            </div>
                        </div>
                        <div class="mx-auto">
                            <div
                                class="w-28 h-28 bg-white flex items-center justify-center shrink-0 border-2 border-pink-700 rounded-full">
                                <h3 class="ml-4 text-md text-blue-800 font-bold">{{ $mostActiveClient }}</h3>
                            </div>
                            <div class="text-center mt-4">
                                <p class="text-lg font-bold">Most Active <br> Client</p>
                            </div>
                        </div>
                        <div class="mx-auto">
                            <div
                                class="w-28 h-28 bg-white flex items-center justify-center shrink-0 border-2 border-pink-700 rounded-full">
                                <h3 class="text-2xl font-extrabold">{{ $organisateurCount }}</h3>
                            </div>
                            <div class="text-center mt-4">
                                <p class="text-lg font-bold">Organisateurs</p>
                            </div>
                        </div>
                        <div class="mx-auto">
                            <div
                                class="w-28 h-28 bg-white flex items-center justify-center shrink-0 border-2 border-pink-700 rounded-full">
                                <h3 class="ml-3 text-md text-blue-800 font-bold">{{ $mostReservedEvent }}</h3>
                            </div>
                            <div class="text-center mt-4">
                                <p class="text-lg font-bold">Most Reserved <br> Event</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>





</x-app-layout>
