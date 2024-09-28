<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-slate-100 text-slate-900">
    <header class="bg-slate-800 shadow-lg">
        <nav class="nav">
            <ul>
                <li class="nav-link"><a href="{{ route('posts.index') }}">Home</a></li>
                <li class="nav-link"><a href="/about">About</a></li>
                <li class="nav-link"><a href="/contact">Contact</a></li>
            </ul>
            @auth
                <div class="relative grid place-items-center" x-data="{ open:false }">
                    {{-- Drop down menu button--}}
                    <button @click="open = !open" type="button" class="round-btn">
                        <img src="https://imgs.search.brave.com/vasE9YfJ6tXPi2KNmvXdRadC1A8y_f9iwagMoGlsPdg/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly90NC5m/dGNkbi5uZXQvanBn/LzAyLzI1LzQyLzA5/LzM2MF9GXzIyNTQy/MDk3M194anB4Um80/a3ExbGZJQ2NJNlNS/NURBaEthVVRLdzVa/ay5qcGc" alt="">
                    </button>

                    {{-- Dropdown menu --}}
                    <div x-show="open" @click.outside="open = false" class="bg-white shadow-lg absolute top-10 right-0 rounded-lg overflow-hidden">
                        {{-- grab the user from the auth func and display it --}}
                        <p class="username">{{ auth()->user()->username }}</p>
                        <a href="{{ route('dashboard') }}" class="block hover:bg-slate-100 pl-4 pr-8 py-2 mb-1">Dashboard</a>
                        <form action="{{ route('logout')}}" method="post">
                            @csrf
                            <button class="block hover:bg-slate-100 pl-4 pr-8 py-2">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            @endauth
            @guest
            <div class="flex items-center gap-4">
                <a href="{{ route('login') }}" class="nav-link">Login</a>
                <a href="{{ route('register') }}" class="nav-link">Register</a>
            </div>
            @endguest
        </nav>
    </header>
    <main class="py-8 px-4 mx-auto max-w-screen-lg">
  
      {{ $slot }}

    </main>
    <footer>
        <p>Copyright &copy; {{ env('APP_NAME') }}</p>
    </footer>
</body>
</html>