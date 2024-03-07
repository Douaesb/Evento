<x-app-layout>
    <div class="min-h-screen flex flex-col sm:flex-row bg-gray-100">
        @include('layouts.navigation')
        <div class="flex justify-center items-center w-full">
            <div
                class="flex justify-center items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl w-full">
                <div class="flex flex-col justify-between p-4 leading-normal">
                    <div class="flex items-center mb-2 ">
                        <a href="{{ route('EvenementsC') }}"
                            class="inline-flex items-center justify-center h-8 w-8 text-lg text-indigo-500"><i
                                class="bx bx-arrow-back"></i></a>
                    </div>
                    <div class="flex justify-between gap-10 ">

                        <h5
                            class="flex justify-center mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            Your Ticket Information </h5>
                        <div class="">

                            <div class="flex items-center text-green-500 mt-2">
                                <span class="ml-2 leading-none text-green-600">
                                    <div>
                                        @if ($event->reservations->isEmpty())
                                            <div class="flex gap-2">
                                                <form
                                                    action="{{ route('createReservation', ['eventId' => $event->id]) }}"
                                                    method="post">
                                                    @csrf
                                                    <button type="submit"
                                                        class="rounded px-4 py-1 text-xs bg-blue-500 text-blue-100 hover:bg-blue-600 duration-300">Reserve</button>
                                                </form>
                                            </div>
                                        @else
                                            @php
                                                $userReservation = $event->reservations
                                                    ->where('user_id', Auth::id())
                                                    ->first();
                                            @endphp

                                            @if ($userReservation)
                                                @if ($userReservation->statut == 'Reserved')
                                                    <span
                                                        class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-green-400 border border-green-400">{{ $userReservation->statut }}</span>
                                                @elseif($userReservation->statut == 'Pending')
                                                    <span
                                                        class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-yellow-400 border border-yellow-400">{{ $userReservation->statut }}</span>
                                                @elseif($userReservation->statut == 'Rejected')
                                                    <span
                                                        class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-red-400 border border-red-400">{{ $userReservation->statut }}</span>
                                                @endif
                                            @else
                                                <div class="flex gap-2">
                                                    <form
                                                        action="{{ route('createReservation', ['eventId' => $event->id]) }}"
                                                        method="post">
                                                        @csrf
                                                        <button type="submit"
                                                            class="rounded px-4 py-1 text-xs bg-blue-500 text-blue-100 hover:bg-blue-600 duration-300">Reserve</button>
                                                    </form>
                                                </div>
                                            @endif
                                        @endif
                                    </div>
                                </span>
                                </span>
                            </div>
                        </div>

                    </div>
                    <p class="mb-3 font-normal text-gray-700"> Categorie : {{ $event->categorie->nom }} </p>
                    <p class="font-normal text-gray-700"> Titre de l'evenement : {{ $event->titre }} </p>
                    <div class="flex items-center justify-between gap-4">
                        <div class="flex text-indigo-500 items-center gap-2 mt-3">
                            Nom du participant :
                            <p class="text-gray-700">{{ $reservation->user->name }} </p>
                        </div>
                    </div>
                    <div class="flex items-center text-green-500 gap-2 mt-3">
                        <span class="ml- leading-none text-gray-600">Joins us at : </span>
                        <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="leading-none"> {{ $event->date }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
