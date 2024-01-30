
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
                    <?php
            $resDao = new ReservationDao();
            $reservations = $resDao->getAllReservation();
            foreach($reservations as $res){
            ?>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <?= $res['id']?>
                        </th>
                        <td class="px-6 py-4">
                            <?= $res['first_name'].' '.$res['last_name']?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $res['book']?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $res['reservation_date']?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $res['return_date']?>
                        </td>
                        <td class="px-6 py-4">
                            <span
                                class="text-lg font-medium text-green-600  dark:text-white"><?php if($res['is_returned']) echo 'returned'; ?></span>
                            <span
                                class="ms-3 font-medium text-red-600 dark:text-white"><?php if(!$res['is_returned']) echo 'not returned'; ?></span>
                        </td>
                        <td class="px-2 py-4 flex">
                            <form method="post" action="../../../app/Controllers/ReservationController.php">
                                <input type="hidden" name="res_id"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    value="<?= $res['id']?>">
                                <input type="hidden" name="book_id"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    value="<?= $res['book_id']?>">
                                <button name="returnd" type="submit"
                                    class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">returned</button>
                            </form>
                        </td>
                    </tr>
                    <?php
            }
        ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
</body>

</html>