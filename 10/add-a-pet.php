<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add a pet</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-950">

    <?php include "partials/menu.php"; ?>

    <div class="mx-auto container w-1/2">
        <div class="p-4 bg-black">
            <div class="w-auto mx-10">
                <h1 class="text-lg font-bold text-white">Add a pet</h1>
                <form class="flex flex-col mt-4" method="post" action="add-a-pet-action.php">
                    <input type="text" name="name" placeholder="Enter pets name" class="px-4 py-3 rounded-md bg-gray-600 border-transparent focus:border-gray-500 focus:bg-gray-600 focus:ring-0 text-sm text-white">
                    <input type="text" name="age" placeholder="Enter pets age" class="px-4 py-3 mt-3 rounded-md bg-gray-600 border-transparent focus:border-gray-500 focus:bg-gray-600 focus:ring-0 text-sm text-white">
                    <input type="text" name="type" placeholder="Enter the type of pet" class="px-4 py-3 mt-3 rounded-md bg-gray-600 border-transparent focus:border-gray-500 focus:bg-gray-600 focus:ring-0 text-sm text-white">
                    <button type="submit" class="px-4 py-3 mt-3 rounded-md border border-transparent leading-6 text-base text-white focus:outline-none bg-blue-500 text-blue-100 hover:text-white focus:ring-offset-2 cursor-pointer inline-flex items-center w-full justify-center font-medium focus:outline-none">Submit</button>
                </form>
            </div>
        </div>
    </div>

</body>
</html>

