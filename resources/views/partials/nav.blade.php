<div class="bg-nav w-full z-30 fixed top-0 lg:block hidden">
            <div class="flex sm:flex-row flex-col sm:space-y-0 space-y-4 items-center mx-auto max-w-7xl justify-between px-8 py-4">
                <div class="">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('assets/v1/web-logo-ok-disbun.png') }}" alt="" class="h-14">
                    </a>
                </div>
                <div class="flex sm:space-x-8 space-x-4">
                    <a href="{{ url('/') }}" class="text-white sm:text-base text-xs font-semibold">Home</a>

                    <a href="{{ url('/tentang') }}" class="text-white sm:text-base text-xs font-semibold">Tentang</a>

                    <a href="{{ url('/map') }}" class="text-white sm:text-base text-xs font-semibold">Peta</a>
                    @if(session('username'))
                        <a href="{{ url('/data') }}" class="text-white sm:text-base text-xs font-semibold">Data</a>
                    @endif
                    @if(!session('username'))
                        <a href="{{ url('/login') }}" class="text-white sm:text-base text-xs font-semibold">Login</a>
                    @else
                        <a href="{{ url('/logout') }}" class="text-white sm:text-base text-xs font-semibold">Logout</a>
                    @endif
                </div>

            </div>
        </div>
