@include('partials.navbar')
    <div class="grid grid-cols-2 pt-32 pl-10">
        <a href="#"
            class="flex flex-col items-center bg-white    md:flex-row md:max-w-xl ">
            <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg"
                src="https://i.ebayimg.com/images/g/e-YAAOSwawNjGu9v/s-l1600.png" alt="">
            <div class="flex flex-col justify-between gap-4 p-4 leading-normal">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-yellow-400">Title :
                    {{ $book->title }}</h5>
                    <div class="flex gap-4">
                        <span class="text-xl  font-bold">Genre: </span>
                        <span class="text-xl">{{ $book->genre }}</span>
                    </div>
                    <div class="flex gap-4">
                        <span class="text-xl  font-bold">Author: </span>
                        <span class="text-xl">{{ $book->author }}</span>
                    </div>
                    <div class="flex gap-4">
                        <span class="text-xl  font-bold">publication year: </span>
                        <span class="text-xl">{{ $book->publication_year }}</span>
                    </div>
                    <div class="flex gap-4">
                        <span class="text-xl  font-bold">Availibale copies: </span>
                        <span class="text-xl">{{ $book->available_copies }}</span>
                    </div>
                    <div class="flex gap-4">
                        <span class="text-xl  font-bold">Description: </span>
                        <span class="text-xl">{{ $book->total_copies }}</span>
                    </div>
            </div>
        </a>


        <div
            class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <a href="#">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Book Reservations
                    Available Now!</h5>
            </a>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Reserve your favorite books today and embark on
                an exciting journey filled with captivating stories and knowledge.</p>
            <!-- Modal toggle -->
            <div class="flex gap-5">
                <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                    class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    type="button" >
                    Reserve
                </button>
                <button type="button"
                    class="block text-white bg-yellow-400 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><a
                        href="{{ route('home') }}">Cancel</a></button>

            </div>

            <span class="text-rose-600"></span>
        </div>

        <!-- Main modal -->
        <div id="crud-modal" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Make New Reservation</h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-toggle="crud-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form class="p-4 md:p-5" method="post" action="{{ route('reservations.store') }}">
                        @csrf
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <div class="col-span-2">
                                <input type="hidden" name="user_id"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    value="{{ $user->id }}">
                            </div>
                            <div class="col-span-2">
                                <input type="hidden" name="book_id"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    value="{{ $book->id }}">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="reservation_date"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">reservation_date</label>
                                <input type="date" name="reservation_date" id="reservation_date"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    required="" >
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="return_date"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Return
                                    date</label>
                                <input type="date" name="return_date" id="return_date"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    required="">
                            </div>
                            
                        </div>
                        <button type="submit" name="reserve"
                            class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Reserve
                        </button>
                    </form>
                </div>
            </div>
        </div>


    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
</body>

</html>