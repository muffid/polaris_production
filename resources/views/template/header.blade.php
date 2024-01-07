<div class="w-full bg-white/60 backdrop-blur border-b z-10 flex flex-row justify-between p-4 items-center fixed top-0 h-20 gap-x-4  ">
    <div class=" fixed left-0 duration-200 flex flex-row items-center justify-center text-2xl px-8 text-slate-700 font-extrabold cursor-pointer "  ><i  id="btnMenu" class="bi bi-list"></i><i class="bi bi-x-circle hidden"></i></div>
    <img src="{{ asset('img/logo.png') }}" alt="logo" class=" ml-16 w-10 cursor-pointer"  onclick="window.location.href = '{{ route('login') }}'">
    <div class="flex flex-col items-end ">
        <p class="text-sm font-bold pr-8"> <span class="text-xl">👋</span> Hi, {{$session['username']}}</p>
        <div class=" pr-8 cursor-pointer hover:font-bold text-blue-500 flex flex-row items-center gap-x-2"  onclick="window.location.href = '{{ route('logout') }}'">
            <i class="bi bi-box-arrow-left"></i>
            <p class="text-xs  text-blue-500">Logout</p>
        </div>
    </div>
</div>
