<nav class="flex flex-row items-center justify-between mx-10 py-5">
    <a href="{{ route('home') }}" class="text-xl font-bold text-blue-500">BlogAway</a>
    <ul>
        <li>
            @guest
                <a href="{{ route('register') }}" class="inline-block hover:text-blue-500">register</a> 
            @endguest
            @auth
                <a href="{{ route('profile') }}" class="mr-10 hover:text-blue-500">{{ Auth::user()->email }} profile</a> 
                <form method="post" action="{{ route('logout') }}" class="inline-block">
                    @csrf           
                    <button type="submit" class="hover:text-blue-500">log out</button>
                </form>
            @endauth
        </li>
    </ul>
</nav>