<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Portfolio</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-black text-white font-serif pb-10">
    <div class="px-10">
        <nav class="flex justify-between items-center py-4 border-b border-white/10">
            <div>
                <a href="/">
                    <img src="{{ Vite::asset('resources/images/logo.svg')  }}" alt="">
                </a>
            </div>
            <div class="space-x-6 font-bold">
                <a href="/">Home</a>
                <a href="">About</a>
                <a href="">Projects</a>
                <a href="">Contact</a>
            </div>
            <div>
                @auth
                    <a href="/jobs/create">Post Jobs</a>
                @endauth
                @guest
                    <div>
                        <a href="/login">Login</a>
                        <a href="/register">Register</a>
                    </div>
                @endguest
            </div>
        </nav>
        <main class="mt-10 max-w-[986px] mx-auto">
            {{ $slot }}
        </main>
    </div>
</body>

</html>
