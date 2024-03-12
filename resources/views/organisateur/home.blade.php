<x-app-layout>
    <div class="min-h-screen h-96 flex flex-col sm:flex-row bg-gray-100 overflow-hidden">
        @include('layouts.navigation')
        <!-- Content -->
        <div class="flex-grow p-4 bg-gray-200 overflow-auto md:overflow-hidden">
            <div class="px-6 py-8 max-w-4xl mx-auto">
                <div class="max-w-4xl mx-auto flex  flex-col gap-6">
                    <div class="max-w-7xl mx-auto  px-4 sm:px-6 lg:py-20 lg:px-8">
                        <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl flex justify-center">
                            Statistiques</h2>
                        <div class="grid grid-cols-2 gap-5 sm:grid-cols-4 mt-4">
                            <div class="bg-white overflow-hidden shadow sm:rounded-lg">
                                <div class="px-4 py-5 sm:p-6">
                                    <dl>
                                        <dt class="text-sm leading-5 font-medium text-gray-500 truncate">Total Events
                                        </dt>
                                        <dd class="mt-1 text-3xl leading-9 font-semibold text-indigo-600">
                                            {{ $totalEvents }}</dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="bg-white overflow-hidden shadow sm:rounded-lg">
                                <div class="px-4 py-5 sm:p-6">
                                    <dl>
                                        <dt class="text-sm leading-5 font-medium text-gray-500 truncate">Events Accepted
                                        </dt>
                                        <dd class="mt-1 text-3xl leading-9 font-semibold text-indigo-600">
                                            {{ $EventsAccepted }}</dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="bg-white overflow-hidden shadow sm:rounded-lg">
                                <div class="px-4 py-5 sm:p-6">
                                    <dl>
                                        <dt class="text-sm leading-5 font-medium text-gray-500 truncate">Events Rejected
                                        </dt>
                                        <dd class="mt-1 text-3xl leading-9 font-semibold text-indigo-600">
                                            {{ $EventsRejected }}</dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="bg-white overflow-hidden shadow sm:rounded-lg">
                                <div class="px-4 py-5 sm:p-6">
                                    <dl>
                                        <dt class="text-sm leading-5 font-medium text-gray-500 truncate">Events Pending
                                        </dt>
                                        <dd class="mt-1 text-3xl leading-9 font-semibold text-indigo-600">
                                            {{ $EventsPending }}</dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white overflow-y-auto max-h-80 shadow sm:rounded-lg">
                        <div class="px-4 py-5 sm:p-6">
                            <div class="flex justify-center font-bold text-lg mb-3">
                                Total Reservations: {{ $totalReservationsForEvents }}
                            </div>
                            <dl>
                                <dt class="text-sm leading-5 font-medium text-gray-500 truncate">
                                    Reservations par evenement
                                </dt>
                                <div class="grid grid-cols-1 gap-5 sm:grid-cols-3">

                                    @foreach ($eventReservations as $event)
                                        <div class="w-fit m-2 mt-6 rounded border-2 border-blue-200 px-2 w-full shadow-lg">
                                            <h3 class="text-lg font-lg">Event : {{ $event->titre }}</h3>
                                            <p>Total Reservations : {{ $event->reservations_count }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
