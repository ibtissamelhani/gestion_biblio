
@include('partials.dashboard')
<div class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            #
                        </th>
                        <th scope="col" class="px-6 py-3">
                            User
                        </th>
                        <th scope="col" class="px-6 py-3">
                            book
                        </th>
                        <th scope="col" class="px-6 py-3">
                            reservation_date
                        </th>
                        <th scope="col" class="px-6 py-3">
                            return_date
                        </th>
                        <th scope="col" class="px-6 py-3">
                            status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
               @foreach ($reservations as $reservation )
                   
               
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $reservation->id }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $reservation->user->first_name}} {{ $reservation->user->last_name}}</td>
                        <td class="px-6 py-4">
                            {{ $reservation->book->title}}
                        </td>
                        <td class="px-6 py-4">
                            {{ $reservation->reservation_date}}
                        </td>
                        <td class="px-6 py-4">
                            {{ $reservation->return_date}}
                        </td>
                        <td class="px-6 py-4">
                            @if($reservation->is_returnd)
                            <span class="text-md font-medium text-green-600  dark:text-white">returned</span>
                            @else
                            <span class="text-md font-medium text-red-600  dark:text-white">not returned</span>
                            @endif
                        </td>
                        <td class="px-2 py-4 flex">
                            <a href="{{ route('reservations.edit', $reservation->id) }}">
                                <button type="button" class="text-white bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:focus:ring-yellow-900">edit</button> 

                            </a>
                                <form action="{{ route('reservations.destroy', $reservation->id) }}" method="post"> 
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">delete</button>
</form>
                        </td>
                    </tr>
                    @endforeach
                   </tbody>
            </table>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
</body>

</html>