<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <title>Users List</title>
</head>
<body class="mt-24">
    <div class="w-1/2 mx-auto sm:px-6 lg:px-8 py-6 ">
        <div class="overflow-hidden  shadow sm:rounded-lg p-4 bg-blue-50">

            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-3xl font-semibold text-center text-gray-900">Users List</h3>
            </div>

            <div class="border-t border-gray-200">
                <ul role="list" class="divide-y divide-gray-200">
                    <li class="flex justify-between p-4">
                        <div class="text-xl font-semibold">name</div>
                        <div class="text-xl font-semibold">email</div>
                    </li>
                    @foreach ($users as $user)
                        <li class="py-3 flex justify-between items-center">
                            <div class="flex w-0 flex-1 items-center">
                                <span class="ml-2 w-0 flex-1 text-sm font-medium text-gray-900">{{ $user['name'] }}</span>
                            </div>
                            <div class="ml-4 flex-shrink-0">
                                <span class="text-sm text-gray-500">{{ $user['email'] }}</span>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
