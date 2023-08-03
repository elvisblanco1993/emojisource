<nav class="w-full h-16 flex items-center justify-between px-4 sm:px-6 lg:px-8">
    <a href="">
        <span class="text-2xl">👾</span>
        <span class="text-lg font-bold">emojisource</span>
    </a>

    <div class="flex items-center">
        @auth
            <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-400 hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
        @else
            <a href="{{ route('login') }}" class="font-semibold text-gray-400 hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-400 hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
            @endif
        @endauth
    </div>
</nav>
