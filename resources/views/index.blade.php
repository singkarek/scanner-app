<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Scanner</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
    <div class="text-center">
        <h2 class="text-3xl font-semibold mb-6">SCANNER</h2>
        <div class="relative overflow-x-auto shadow-md rounded-sm border">
            <form action="/scan" method="POST">
                @csrf
                <table class="w-full text-sm text-left border">
                    <thead class="text-xs text-gray-700 uppercase bg-red-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                No.
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Serial Number
                            </th>
                            {{-- <th scope="col" class="px-6 py-3">
                                Versi Modem
                            </th> --}}
                            {{-- <th scope="col" class="px-6 py-3">
                                Tipe Modem
                            </th> --}}
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody id="dynamic-table">
                        <tr>
                            <td class="px-6 py-4">
                                1
                            </td>
                            <td class="px-6 py-4">
                                <input type="text" class="px-2.5 text-sm" name="modem[1][sn]" placeholder="sn" id="input" autofocus>
                            </td>
                            {{-- <td class="px-6 py-4">
                                <input type="text" class="px-2.5 text-sm" name="modem[1][versi]" placeholder="versi" id="inputversi">
                            </td> --}}
                            {{-- <td class="px-6 py-4">
                                <input type="text" class="px-2.5 text-sm" name="type" placeholder="type" id="inputtype">
                            </td> --}}
                            {{-- <td class="px-6 py-4">
                                <button type="submit">+</button>
                            </td> --}}
                        </tr>
                    </tbody>
                </table>
                <div class="flex justify-end">
                    <button type="submit" class="mr-6 p-2 rounded bg-green-500">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var i = 1;
            // Listen for the 'keydown' event on input elements
            $(document).keydown(function(event) {
                // Check if the pressed key is Enter (key code 13)
                if (event.keyCode === 13) {
                    // Prevent the default form submission
                    event.preventDefault();
                    // Perform your desired action here
                    // For example, you can submit a form or trigger a specific function
                    // Replace the following line with your desired action
                    newRow();
                    // alert('Enter key pressed!');
                }
            });

            function newRow() {
                i++;
                var newRow = `
                <tr id="row${i}">
                    <td class="px-6 py-4">
                        ${i}
                    </td>
                    <td class="px-6 py-4">
                        <input type="text" class="px-2.5 text-sm" name="modem[${i}][sn]" placeholder="input sn" id="inputsn">
                    </td>
                    {{-- <td class="px-6 py-4">
                        <input type="text" class="px-2.5 text-sm" name="modem[${i}][versi]" placeholder="versi" id="inputversi">
                    </td> 
                    <td class="px-6 py-4">
                        <input type="text" class="px-2.5 text-sm" name="type" placeholder="type" id="inputtype">
                    </td> --}}
                    <td class="px-6 py-4">
                        <button class="btn_remove bg-red-500 px-2 rounded" id="${i}" type="button">-</button>
                    </td>
                </tr>
            `;
                $("#dynamic-table").append(newRow);
                $("#dynamic-table tr:last-child #inputsn").focus();
            }

            $(document).on('click', '.btn_remove', function() {
                var button_id = $(this).attr("id");
                $('#row' + button_id + '').remove();
                resetRowNumbers();
            });

            function resetRowNumbers() {
            var rows = $("#dynamic-table tr");
            for (var j = 0; j < rows.length; j++) {
                var row = $(rows[j]);
                row.find("td:first-child").text(j + 1);
            }
            i = rows.length;
        }
        });
    </script>
</body>
</html>