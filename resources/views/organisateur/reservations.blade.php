<x-app-layout>
    <div class="min-h-screen flex flex-col sm:flex-row bg-gray-100">
        @include('layouts.navigation')
        <div class="flex-grow p-4 bg-gray-200">
            <section class="flex flex-wrap mt-20 mx-auto md:px-12 flex-grow">
                <div class="container mx-auto px-4 md:px-12">
                    <div class="flex justify-center bg-white rounded-xl p-2 w-40 mb-5 shadow-lg">
                        <h2 class="text-lg font-bold">Evenements</h2>
                    </div>
                    <div class="flex flex-wrap -mx-1 lg:-mx-4">
                        @foreach ($reservations as $reservation)
                            <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">

                                <div
                                    class="h-fit bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">

                                    <div class="flex flex-col items-center justify-between p-2 leading-normal">
                                        <h5 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                                            {{ $reservation->evenement->titre }}</h5>
                                    </div>
                                    <div class="flex flex-col p-4 gap-2 ">
                                        <div>
                                            @if ($reservation->statut == 'Pending')
                                                <div class="flex justify-center gap-2">
                                                    <form action="{{ route('updateReservationStatus', $reservation->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('patch')
                                                        <input type="hidden" name="statut" value="Reserved">
                                                        <button type="submit"
                                                            class="rounded px-4 py-1 text-xs bg-green-500 text-green-100 hover:bg-green-600 duration-300">Accept</button>
                                                    </form>

                                                    <form action="{{ route('updateReservationStatus', $reservation->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('patch')
                                                        <input type="hidden" name="statut" value="Rejected">
                                                        <button type="submit"
                                                            class="rounded px-4 py-1 text-xs bg-red-600 text-red-100 hover:bg-red-700 duration-300">Reject</button>
                                                    </form>
                                                </div>
                                            @elseif($reservation->statut == 'Reserved')
                                                <span
                                                    class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-green-400 border border-green-400">{{ $reservation->statut }}</span>
                                            @elseif($reservation->statut == 'Rejected')
                                                <span
                                                    class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-red-400 border border-red-400">{{ $reservation->statut }}</span>
                                            @endif
                                        </div>
                                        <div class="flex items-center gap-2">
                                            Date d'evenement :
                                            <span class=" text-green-500 ml-1 leading-none"> {{ $reservation->evenement->date }}
                                            </span>
                                        </div>
                                        <div class="flex items-center">
                                            Nom et Prenom : 
                                            <p class="ml-2"> {{ $reservation->user->name }}</p>
                                        </div>
                                        @if($reservation->numplace)
                                        <div class="flex items-center">
                                            N° de place : 
                                            <p class="ml-2"> {{ $reservation->numplace }}</p>
                                        </div>
                                        @endif
                                    </div>

                                </div>

                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        </div>
    </div>
</x-app-layout>
