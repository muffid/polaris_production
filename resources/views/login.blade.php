<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/utils.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="icon" href="{{ asset('img/ico.png') }}" type="image/x-icon">
    <title>Login</title>
</head>
<body class=" bg-[#E9E9E9] font-nunito">
    <div class="max-w-[1700px] mx-auto my-auto flex items-center justify-center h-screen ">
        <div class="bg-white rounded-xl p-10 flex flex-col items-center gap-y-6 mx-auto shadow-slate-300 shadow-lg">
            <img src="{{ asset('img/logo.png') }}" alt="logo" class="w-60">
            <div class="flex flex-col items-center gap-y-3 lg:gap-y-5 p-4">

                <div onclick="window.location.href = '{{ route('login_admin_page') }}'" class="flex flex-row items-center justify-between bg-slate-50 rounded-full p-2 gap-x-3 w-[250px] lg:w-[300px] hover:text-blue-800 cursor-pointer hover:scale-105 transition-transform ease-out">
                    <div class="bg-white p-4 rounded-full flex items-center justify-center">
                        <img src="{{ asset('img/boss.png') }}" alt="logo" class="w-8 min-w-[1.5rem]">
                    </div>
                    <p class=" lg:font-semibold">Administrator</p>
                    <div class="p-4 rounded-full flex flex-row items-center justify-center">
                        <i class="bi bi-caret-right-fill w-6 min-w-[1.5rem] flex flex-row items-center justify-center"></i>
                    </div>
                </div>

                <div  onclick="window.location.href = '{{ route('login_desainer_page') }}'" class="flex flex-row items-center justify-between bg-slate-50 rounded-full p-2 gap-x-3 w-[250px] lg:w-[300px] hover:text-blue-800 cursor-pointer  hover:scale-105 transition-transform ease-out">
                    <div class="bg-white p-4 rounded-full flex items-center justify-center">
                        <img src="{{ asset('img/working.png') }}" alt="logo" class="w-8 min-w-[1.5rem]">
                    </div>
                    <p class=" lg:font-semibold">Desainer</p>
                    <div class="p-4 rounded-full flex flex-row items-center justify-center">
                        <i class="bi bi-caret-right-fill w-6 min-w-[1.5rem] flex flex-row items-center justify-center"></i>
                    </div>
                </div>

                <div onclick="window.location.href = '{{ route('login_setting_page') }}'" class="flex flex-row items-center justify-between bg-slate-50 rounded-full p-2 gap-x-3 w-[250px] lg:w-[300px] hover:text-blue-800 cursor-pointer  hover:scale-105 transition-transform ease-out">
                    <div class="bg-white p-4 rounded-full flex items-center justify-center">
                        <img src="{{ asset('img/operator.png') }}" alt="logo" class="w-8 min-w-[1.5rem]">
                    </div>
                    <p class=" lg:font-semibold">Setting</p>
                    <div class="p-4 rounded-full flex flex-row items-center justify-center">
                        <i class="bi bi-caret-right-fill w-6 min-w-[1.5rem] flex flex-row items-center justify-center"></i>
                    </div>
                </div>

                <div class="flex flex-row items-center justify-between bg-slate-50 rounded-full p-2 gap-x-3 w-[250px] lg:w-[300px] cursor-pointer hover:text-blue-800 hover:scale-105 transition-transform ease-out">
                    <div class="bg-white p-4 rounded-full flex items-center justify-center">
                        <img src="{{ asset('img/settings.png') }}" alt="logo" class="w-8 min-w-[1.5rem]">
                    </div>
                    <p class=" lg:font-semibold">Operator</p>
                    <div class="p-4 rounded-full flex flex-row items-center justify-center">
                        <i class="bi bi-caret-right-fill w-6 min-w-[1.5rem] flex flex-row items-center justify-center"></i>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>
</html>
