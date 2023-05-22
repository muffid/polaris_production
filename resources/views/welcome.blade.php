<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <title>Polaris Production Management System - Welcome</title>
    </head> 
    <body class=" scrollbar-thin scrollbar-thumb-emerald-300 bg-[#EFEFEF] w-screen ">
        <div class=" w-screen h-screen mx-auto my-auto flex flex-col py-12 items-center justify-center bg-slate-200 max-w-[1700px]">
           
            <div class="mx-auto bg-white my-auto rounded flex flex-col items-center p-8 gap-y-8 relative w-[500px]">
                <div class="absolute w-full h-1 bg-emerald-500 top-0"></div>
                <div class="flex flex-col items-center gap-y-1">
                    <img src="{{ asset('img/LOGO.png') }}" alt="Deskripsi Gambar" class=" w-12">
                    <p class="font-semibold text-xl text-center">Polaris Adv</p>
                    <p class="text-slate-400 text-sm">Polaris Production Management System</p>
                    <p class="text-slate-400 text-sm">App Version v 1.0.0</p>
                </div>
                <div class="grid grid-cols-2 px-16 gap-8">
                    <div class="rounded-lg border border-slate-200 p-8 flex flex-col items-center justify-center gap-y-4 cursor-pointer
                                hover:text-emerald-500 hover:shadow-lg hover:scale-105 transition-transform ease-out" onclick="window.location.href = '{{ route('admin_login') }}'">
                        <img src="{{ asset('img/boss.png') }}" alt="Deskripsi Gambar" class=" w-14">
                        <p class="font-semibold text-lg">Administrator</p>
                    </div>
                    <div class="rounded-lg border border-slate-200 p-8 flex flex-col items-center justify-center gap-y-4 cursor-pointer
                                hover:text-emerald-500 hover:shadow-lg hover:scale-105 transition-transform ease-out">
                        <img src="{{ asset('img/working.png') }}" alt="Deskripsi Gambar" class=" w-14">
                        <p class="font-semibold text-lg">Desainer</p>
                    </div>
                    <div class="rounded-lg border border-slate-200 p-8 flex flex-col items-center justify-center gap-y-4 cursor-pointer
                                hover:text-emerald-500 hover:shadow-lg hover:scale-105 transition-transform ease-out">
                        <img src="{{ asset('img/operator.png') }}" alt="Deskripsi Gambar" class=" w-14">
                        <p class="font-semibold text-lg">Admin</p>
                    </div>
                    <div class="rounded-lg border border-slate-200 p-8 flex flex-col items-center justify-center gap-y-4 cursor-pointer
                                hover:text-emerald-500 hover:shadow-lg hover:scale-105 transition-transform ease-out">
                        <img src="{{ asset('img/settings.png') }}" alt="Deskripsi Gambar" class=" w-14">
                        <p class="font-semibold text-lg">Operator</p>
                    </div>
                </div>
                <div class="flex flex-col items-center gap-y-1">
                    <p class="text-slate-400 text-xs">Copyright Polaris Adv Malang - 2023</p>
                </div>
            </div>
        </div> 
    </body> 
</html>
 