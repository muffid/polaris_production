<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="icon" href="{{ asset('img/ico.png') }}" type="image/x-icon">
    <title>Login</title>
</head>
<body class=" bg-[#E9E9E9] font-nunito">
    <div class="max-w-[1700px] mx-auto my-auto flex items-center justify-center h-screen ">
        <div class="flex justify-center items-center h-screen">
            <div class="w-full max-w-xs">
                @if(session('Gagal'))
                    <script>
                       // Nanti ditampilkan Pop Up Disini
                    </script>
                @endif
                <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST" action="{{ route('login_admin') }}">
                    @csrf
    
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                            Username
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="Username" name="username" required autofocus>
                    </div>
    
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                            Password
                        </label>
                        <input class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="******************" name="password" required>
                    </div>
    
                    <div class="flex items-center justify-between">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                            Login
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>