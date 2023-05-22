<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <title>Polaris Production Management System - Administrator Login</title>
    </head> 

    <body class=" scrollbar-thin scrollbar-thumb-emerald-300 bg-[#EFEFEF] ">
        <div class=" w-screen h-screen mx-auto my-auto flex flex-col items-center justify-center bg-slate-200 py-20">
            <div class="mx-auto bg-white my-auto rounded flex flex-col items-center p-8 gap-y-2 relative w-1/3 ">
                <div class="absolute w-full h-1 bg-emerald-500 top-0"></div>
                <div class="flex flex-col items-center gap-y-1">
                    <p class="font-semibold text-xl">Login</p>
                    <p class="text-slate-400 text-sm">Administrator</p>
                    <img src="{{ asset('img/boss.png') }}" alt="Deskripsi Gambar" class=" w-16 rounded-full mt-6 bg-emerald-100 p-4">
                </div> 
                <form action="{{ route('admin_dashboard') }}" method="POST">
                    <div class="flex flex-col items-center gap-y-4 w-full my-4 justify-center max-w-lg">
                        @csrf
                        <div class="flex flex-row items-center justify-center  w-full">
                            <input type="text" placeholder="Username" name="name" id="name"class="border border-gray-300 px-4 py-2 rounded-md focus:outline-none  focus:ring-emerald-500 focus:border-emerald-500 text-sm">
                        </div>
                        <div class="flex flex-row items-center justify-center w-full">
                            <input type="password" placeholder="Password" name="name" id="name"class="border border-gray-300 px-4 py-2 rounded-md focus:outline-none  focus:ring-emerald-500 focus:border-emerald-500 text-sm">
                        </div>
                        <button type="submit" class=" bg-emerald-300 px-6 py-2 rounded text-sm">Login</button>
                    </div>
                </form>
                <div class="flex flex-col items-center gap-y-1">
                    <p class="text-slate-400 text-xs">Copyright Polaris Adv Malang - 2023</p>
                </div>
            </div>
        </div> 
    </body> 
</html>