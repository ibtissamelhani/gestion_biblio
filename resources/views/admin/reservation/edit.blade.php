@include('partials.dashboard')
    <div class="p-4 mt-4 sm:ml-64">
        <div class="flex justify-center p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
            <form method="post" action="{{route('reservations.update',$reservation->id) }}" class="p-4 border border-gray-200 rounded md:p-5 ">
                @method('put')
                @csrf
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                            <input type="hidden" id="disabled-input" name="user_id" aria-label="disabled input" value="{{ $reservation->user_id}}" class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" value="Disabled input" disabled>
                    </div>
                    <div class="col-span-2">
                            <input type="hidden" id="disabled-input" name="book_id" aria-label="disabled input" value="{{ $reservation->book_id }}" class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" value="Disabled input" disabled>
                    </div>
                    <div class="col-span-2">
                        <label for="name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">reserver</label>
                            <input type="text" id="disabled-input" aria-label="disabled input" value="{{ $reservation->user->first_name }} {{ $reservation->user->last_name }}" class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" value="Disabled input" disabled>
                    </div>
                    <div class="col-span-2">
                        <input type="text" id="disabled-input" name="book_id" aria-label="disabled input" value="@if($reservation->is_returnd) Returned @else Not Returned @endif" class="mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed  @if($reservation->is_returnd) bg-green-50 border border-green-500 text-green-700 @else bg-red-50 border border-red-500 text-red-900 text-gray-900 @endif" value="Disabled input" disabled>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="name"
                            class="block mb-2 text-sm font-medium text-gray-900">reservation date</label>
                        <input type="text" name="author" id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:focus:ring-primary-500 dark:focus:border-primary-500"
                           name="reservation_date" value="{{ $reservation->reservation_date }}" required="" disabled>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="name"
                            class="block mb-2 text-sm font-medium text-gray-900">returnd date</label>
                            <input type="date" name="return_date" id="return_date" name="return_date"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            value="{{ $reservation->return_date }}" required="">
                    </div>
                    <div class="col-span-2 ">
                        <label for="category"
                            class="block mb-2 text-sm font-medium text-gray-900">status</label>
                        <select name="status" id="category" value="{{ $reservation->status }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option >Pending</option>
                            <option>Accept</option>
                            <option>returned</option>
                        </select>
                    </div>
                </div>
                <button name="update" type="submit" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">Update</button>
                <a href="{{ route('reservations.index') }}" class="inline-flex items-center font-medium text-blue-600  hover:underline">
                    Cancel
                    <svg class="w-4 h-4 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                    </a>
            </form>
        </div>
    </div>