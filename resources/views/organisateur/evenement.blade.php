<x-app-layout>

    <div class="min-h-screen flex flex-col sm:flex-row bg-gray-100">
        @include('layouts.navigation')
        <!-- Content -->
        <div class="flex-grow p-4 bg-gray-200">
            <section class="flex flex-wrap mt-20 mx-auto md:px-12 flex-grow">
                <!-- Main modal -->
                <div id="crud-modal" tabindex="-1" aria-hidden="true"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-md max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow bg-blue-50">
                            <!-- Modal header -->
                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-600">
                                <h3 class="text-lg font-semibold text-gray-900 text-black">
                                    Create New Event
                                </h3>
                                <button type="button"
                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center hover:bg-gray-600 hover:text-white"
                                    data-modal-toggle="crud-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <form class="p-4 md:p-5" action="{{ route('addEvent') }}" method="post">
                                @csrf
                                <div class="grid gap-4 mb-4 grid-cols-2">
                                    <div class="col-span-2">
                                        <label for="category"
                                            class="block mb-2 text-sm font-medium text-gray-900 text-black">Categorie</label>
                                        <select id="category" name="categorieID"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 bg-gray-100 border-gray-500 placeholder-gray-400 text-black focus:ring-primary-500 focus:border-primary-500">
                                            <option selected disabled="">Select categorie</option>
                                            @foreach ($categories as $categorie)
                                                <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-span-2">
                                        <label for=""
                                            class="block mb-2 text-sm font-medium text-gray-900 text-black">Event
                                            title</label>
                                        <input type="text" name="titre" id="titre"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 bg-gray-100 border-gray-500 placeholder-gray-400 text-black focus:ring-primary-500 focus:border-primary-500"
                                            placeholder="Type event title" required="">
                                    </div>
                                    <div class="col-span-2">
                                        <label for=""
                                            class="block mb-2 text-sm font-medium text-gray-900 text-black">Event
                                            Description</label>
                                        <textarea name="description" rows="3"
                                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 bg-gray-100 border-gray-500 placeholder-gray-400 text-black focus:ring-blue-500 focus:border-blue-500"
                                            placeholder="Write Event description here"></textarea>
                                    </div>
                                    <div class="col-span-2">
                                        <label for=""
                                            class="block mb-2 text-sm font-medium text-gray-900 text-black">Event
                                            location</label>
                                        <input type="text" name="lieu" id="lieu"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 bg-gray-100 border-gray-500 placeholder-gray-400 text-black focus:ring-primary-500 focus:border-primary-500"
                                            placeholder="Type event location" required="">
                                    </div>
                                    <div class="col-span-2">
                                        <label for=""
                                            class="block mb-2 text-sm font-medium text-gray-900 text-black">Event number
                                            of
                                            places</label>
                                        <input type="number" name="places" id="places"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 bg-gray-100 border-gray-500 placeholder-gray-400 text-black focus:ring-primary-500 focus:border-primary-500"
                                            placeholder="Type event places" required="">
                                    </div>
                                    <div class="col-span-2">
                                        <label for="category"
                                            class="block mb-2 text-sm font-medium text-gray-900 text-black">reservation
                                            mode</label>
                                        <select id="mode" name="mode"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 bg-gray-100 border-gray-500 placeholder-gray-400 text-black focus:ring-primary-500 focus:border-primary-500">
                                            <option selected disabled="">choose mode of reservation</option>
                                            <option value="automatique">automatique</option>
                                            <option value="manuelle">manuelle</option>
                                        </select>
                                    </div>

                                    <button type="submit" name="addEvent"
                                        class="inline-flex items-center focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-blue-200 hover:bg-blue-400 focus:ring-blue-800">
                                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        Add new Event
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

                <!-- Main modal -->
                <div id="authentication-modal" tabindex="-1" aria-hidden="true"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-md max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow bg-blue-50">
                            <!-- Modal header -->
                            <div
                                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-600">
                                <h3 class="text-xl font-semibold text-gray-900 text-black">
                                    Update Event
                                </h3>
                                <button type="button"
                                    class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center hover:bg-gray-600 hover:text-white"
                                    data-modal-hide="authentication-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="p-4 md:p-5">
                                <form class="p-4 md:p-5" action="" method="post">
                                    <div class="grid gap-4 mb-4 grid-cols-2">
                                        <div class="col-span-2">

                                            <input type="hidden" name="EventID" id="editEventId">

                                            <label for="updateEventCategory"
                                                class="block mb-2 text-sm font-medium text-gray-900 text-black">Category</label>
                                            <select id="updateEventCategory" name="updateEventCategory"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 bg-gray-100 border-gray-500 placeholder-gray-400 text-black focus:ring-primary-500 focus:border-primary-500">
                                                <option selected disabled="">Select categorie</option>
                                                <?php
                                                // foreach ($cats as $category) {
                                                //     echo "<option value='{$category->getCategorieID()}'>{$category->getCategorie()}</option>";
                                                // }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="col-span-2">
                                            <label for="updateEventTitle"
                                                class="block mb-2 text-sm font-medium text-gray-900 text-black">Event
                                                Title</label>
                                            <input type="text" id="updateEventTitle" name="updateEventTitle"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 bg-gray-100 border-gray-500 placeholder-gray-400 text-black focus:ring-primary-500 focus:border-primary-500"
                                                placeholder="Type Event title" required="">
                                        </div>
                                        <div class="col-span-2">
                                            <label for="updateEventDescription"
                                                class="block mb-2 text-sm font-medium text-gray-900 text-black">Event
                                                Description</label>
                                            <textarea id="updateEventDescription" name="updateEventDescription" rows="4"
                                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 bg-gray-100 border-gray-500 placeholder-gray-400 text-black focus:ring-blue-500 focus:border-blue-500"
                                                placeholder="Write Event description here"></textarea>
                                        </div>
                                    </div>
                                    <button type="submit" name="editEvent"
                                        class="inline-flex items-center focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-blue-200 hover:bg-blue-400 focus:ring-blue-800">
                                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        Update Event
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container mx-auto px-4 md:px-12">
                    <div class="flex justify-center bg-white rounded-xl p-2 w-40 mb-5 shadow-lg">

                        <h2 class="text-lg font-bold">Evenements</h2>
                    </div>
                    <div class="flex flex-wrap -mx-1 lg:-mx-4">


                        <!-- Create Project Card -->
                        <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">

                            <!-- Article -->
                            <article class="overflow-hidden rounded-lg shadow-lg">
                                <div
                                    class="group bg-gray-50 py-14 px-4 flex flex-col space-y-2 items-center cursor-pointer rounded-md ">
                                    <a data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                                        class="bg-gray-200 text-yellow-700 group-hover:text-gray-800 group-hover:smooth-hover flex w-20 h-20 rounded-full items-center justify-center"
                                        href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-600"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                        </svg>
                                    </a>
                                    <a class="text-gray-600 group-hover:text-gray-800 group-hover:smooth-hover text-center"
                                        href="#"><button data-modal-target="crud-modal"
                                            data-modal-toggle="crud-modal" type="button">
                                            Create Event </button> </a>
                                </div>
                            </article>
                            <!-- END Article -->

                        </div>
                        <!-- END Column -->

                        @foreach ($evenements as $evenement)
                            <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">
                                <article class="overflow-hidden rounded-lg shadow-lg h-full bg-blue-100 ">
                                    <div class="flex flex-col justify-between py-4 px-8 h-52">
                                        <p class="text-gray-700 mb-2">
                                            Categorie : {{ $evenement->categorie->nom }}
                                        </p>
                                        <h1 class="text-xl font-semibold mb-2">TITLE :
                                        </h1>
                                        <div class="flex sm:rounded-lg p-1 gap-8 ml-2">

                                        </div>
                                        <div class="flex justify-between">
                                            <div class="flex flex-col justify-between text-sm text-gray-600">
                                                <div class="flex items-center">
                                                    <span
                                                        class="inline-flex items-center justify-center h-8 w-8 text-lg text-gray-400"><i
                                                            class="bx bx-user"></i></span>
                                                    <p class="ml-2">nom prenom</p>
                                                </div>
                                                <div class="flex items-center text-green-500 gap-2 mt-3">
                                                    <span class="ml- leading-none text-gray-600"></span>
                                                    <svg class="w-4 h-4 fill-current"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    <span class="ml-1 leading-none"> date
                                                    </span>

                                                </div>

                                            </div>
                                            <div class="flex items-center gap-6">
                                                <a href="#" title="Edit" class="editButton"
                                                    data-modal-target="authentication-modal"
                                                    data-modal-toggle="authentication-modal">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="16"
                                                        width="16"
                                                        viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                                                        <path opacity="1" fill="#2766d3"
                                                            d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z" />
                                                    </svg>
                                                </a>
                                                <a title="delete" href="">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="16"
                                                        width="14"
                                                        viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                                                        <path fill="#e6321e"
                                                            d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z" />
                                                    </svg>
                                                </a>
                                                <a href="" title="view details">
                                                    <svg xmlns="http://www.w3.org/2000/svg" alt="title"
                                                        height="16" width="18"
                                                        viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                                                        <path fill="#dfa401"
                                                            d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z" />
                                                    </svg>
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                </article>
                            </div>
                        @endforeach


                    </div>
                </div>
            </section>

        </div>
    </div>


</x-app-layout>
