<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{env('APP_NAME')}}</title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-slate-100 text-slate-900">
    
    <header class="bg-slate-800 shadow-lg">
        <nav class="navbar">
            <a href="{{ route('posts.index') }}" class="nav-link">Home</a>

            @auth
                <div class="relative grid place-items-center"
                x-data="{open: false}">
                    {{--dropdown mwnu button--}}
                    <button @click="open = !open"  type="button" class="round-btn">
                        <img src="" alt="">
                    </button>

                    {{--dropdown menu--}}
                    <div x-show="open" @click.outside="open = false" 
                    class="bg-white shadow-lg absolute
                    top-10 right-0 rounded-lg overflow-hidden
                    font-light">

                        <p class="block pl-4 pr-8 py-2 mb-1" style="color: gray">
                            {{auth()->user()->name}}</p>

                        <a href="{{ route('dashboard') }}" class="block hover:bg-slate-100 pl-4 pr-8 py-2">
                            Dashboard</a>

                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button class="block hover:bg-slate-100 pl-4 pr-16 py-2">
                                Logout
                            </button>
                        </form>

                    </div>

                </div>
            @endauth

            @guest
                <div class="flex item-center gap-4">
                    <a href="{{ route('login') }}" class="nav-link">Login</a>
                    <a href="{{ route('register') }}" class="nav-link register-btn">Register</a>
                </div>
            @endguest
            
        </nav>
    </header>

    <main class="py-8 px-4 mx-auto mx-w-screen-lg">
        {{$slot}}
    </main>
    
</body>
</html>