<aside id="menu" class="w-72 -ml-72 h-screen overflow-y-scroll overflow-x-auto scrollbar-thin scrollbar-thumb-slate-50  flex flex-col bg-white/80 backdrop-blur duration-200  fixed top-0 left-0 gap-y-4 shadow-lg z-20 ">
    <div  class=" w-full flex flex-row justify-end px-4 text-xl gap-x-2 items-center pt-2  text-slate-500 "><i id="iconMenu" class="bi bi-list  cursor-pointer"></i></div>
    {{-- <div class="flex flex-col items-center justify-center  p-4 md:p-8 ">
         <img src="{{ asset('img/logo.png') }}" alt="logo" class="w-56">
    </div> --}}

    <div class="flex flex-col items-center justify-center gap-y-3">
        <div class=" rounded-full flex flex-col items-center justify-center p-1">
            <div class="w-16 h-16 relative">
                <img src="{{ asset('img/man.png') }}" alt="logo" class="w-full h-full object-cover rounded-full">
                <div class="absolute bg-white p-2 flex flex-col items-center justify-center rounded-full right-0 -bottom-4 cursor-pointer hover:scale-105 shadow-lg hover:text-orange-500 text-xs text-emerald-700">
                    <i class="bi bi-pencil-fill"></i>
                </div>
            </div>
        </div>
        <div class="flex flex-col items-center justify-center">
            <h1 class="text-xl font-bold text-[#084957]">{{$session['username']}}</h1>
            <h1 class="text-slate-500 text-sm">{{$session['status']}}</h1>
        </div>
        <div class=" cursor-pointer hover:font-bold flex flex-row items-center gap-x-2"  onclick="window.location.href = '{{ route('logout') }}'">
            <i class="bi bi-box-arrow-left"></i>
            <p class="text-sm   text-[#084957]" >Logout</p>
        </div>

    </div>
    <div class="w-full flex h-full flex-col py-4 gap-y-2">
       <div class="flex flex-row items-center justify-start relative cursor-pointer">
            @if($active=='Dashboard')
                <div class="w-2 h-full bg-emerald-800 absolute left-0"></div>
            @else
            @endif
            <div class="w-full @if($active == 'Dashboard') bg-slate-100 @endif flex flex-row hover:bg-slate-100 items-center justify-start py-2 pl-6 lg:pl-14 gap-x-2" onclick="window.location.href = '{{ route('dashboard_admin') }}'">
                <i class="bi bi-house-door-fill"></i>
                <h1 class="text-sm font-semibold">Dashboard</h1>
            </div>
       </div>
       <div class="flex flex-row items-center justify-start relative ">
            <div class="w-full  flex py-2 pl-6 lg:pl-14 flex-row items-center justify-start gap-x-2">
                <i class="bi bi-clipboard-data"></i>
                <h1 class="text-sm font-semibold">Setting Order</h1>
            </div>
        </div>
        <div class="flex  flex-row items-center justify-start relative cursor-pointer" onclick="window.location.href = '{{ route('handle_ecomm') }}'">
            @if($active=='Handle_Ecomm')
                <div class="w-2 h-full bg-emerald-800 absolute left-0"></div>
            @endif
            <div class="w-full  @if($active == 'Handle_Ecomm') bg-slate-100 @endif hover:bg-slate-100 flex py-2 pl-12 lg:pl-[74px]">
                <h1 class=" text-xs">Ecommerce</h1>
            </div>
        </div>
        <div class="flex flex-row items-center justify-start relative cursor-pointer" onclick="window.location.href = '{{ route('nonecommerce_admin') }}'">
            @if($active=='NonEcommerce')
                <div class="w-2 h-full bg-emerald-800 absolute left-0"></div>
            @endif

            <div class="w-full @if($active == 'NonEcommerce') bg-slate-100 @endif hover:bg-slate-100 flex py-2 pl-12 lg:pl-[74px]">
                <h1 class=" text-xs ">Non Ecommerce</h1>
            </div>
        </div>




        <div class="flex flex-row items-center justify-start relative cursor-pointer  " onclick="window.location.href = '{{ route('monitor') }}'">
            @if($active=='Monitor')
            <div class="w-2 h-full bg-emerald-800 absolute left-0"></div>
        @else
        @endif
            <div class="w-full @if($active == 'Monitor') bg-slate-100 @endif hover:bg-slate-100  flex py-2 pl-6 lg:pl-14 flex-row items-center justify-start gap-x-2">
                <i class="bi bi-binoculars-fill"></i>
                <h1 class="text-sm font-semibold">Monitor Order</h1>
            </div>
        </div>


        <div class="flex flex-row items-center justify-start relative cursor-pointer ">
            <div class="w-full hover:bg-slate-100  flex py-2 pl-6 lg:pl-14 flex-row items-center justify-start gap-x-2">
                <i class="bi bi-person-circle"></i>
                <h1 class="text-sm font-semibold">Akun</h1>
            </div>
        </div>
    </div>
</aside>
