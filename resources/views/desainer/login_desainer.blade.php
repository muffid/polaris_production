<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="icon" href="{{ asset('img/ico.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('css/iziToast.min.css')}}">
    <script src="{{asset('js/iziToast.min.js')}}" type="text/javascript"></script>
    <title>Login</title>
</head>
<body class=" bg-[#E9E9E9] font-nunito">
    <div class="max-w-[1700px] mx-auto my-auto flex items-center justify-center h-screen ">
        <div class="flex justify-center items-center h-screen">
            <div class="w-full max-w-xs">
                @if(session('Gagal'))
                    <script>
                      iziToast.error({
                        title: 'Failed',
                        message: 'gagal login',
                        position: 'topRight',
                    });
                    </script>
                @endif
               <h1 class="mx-auto font-bold text-center text-2xl mb-8">Login Desainer</h1>
                <form class="bg-white flex flex-col items-center  rounded-xl px-16 pt-6 pb-8 mb-4" method="POST" action="{{ route('login_desainer') }}">
                    @csrf
                    <div class="mb-4 flex flex-col items-center">
                        <label class="block text-gray-700  mb-2" for="username">
                            <h1 class=""><span><i class="bi bi-person-circle mx-2"></i></span> username</h1>
                        </label>
                        <input class="appearance-none border-b text-center w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text"  name="username" required autofocus>
                    </div>
                    <div class="mb-4 flex flex-col items-center">
                        <label class="block text-gray-700 mb-2" for="password">
                            <h1 class=""><span><i class="bi bi-key mx-2"></i></span>password</h1>
                        </label>
                        <input class="appearance-none border-b text-center  w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password"  name="password" required>
                    </div>
                    <div class="flex items-center justify-between gap-x-3">
                        <button onclick="window.location.href = '{{ route('login') }}'" class="bg-orange-500 rounded-sm hover:bg-orange-600 text-white  py-2 px-4 text-sm focus:outline-none focus:shadow-outline" type="button">
                            Kembali
                        </button>
                        <button class="bg-blue-700 rounded-sm hover:bg-blue-800 text-white  py-2 px-4 text-sm focus:outline-none focus:shadow-outline" type="submit">
                            Login
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
