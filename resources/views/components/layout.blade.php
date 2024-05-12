<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Portfolio</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-black text-white border-b border-white/10">
    <div class="px-10">
        <nav class="flex justify-between items-center  py-4">
            <div>
                <a href="">
                    <img src="{{ Vite::asset('resources/images/logo.svg')  }}" alt="">
                </a>
            </div>
            <div>
                <a href="">Home</a>
                <a href="">About</a>
                <a href="">Projects</a>
                <a href="">Contact</a>
            </div>
            <div>
                <a href="">Login</a>
                <a href="">Register</a>
            </div>
        </nav>
        <main>
            {{ $slot }}
        </main>
    </div>
</body>

</html>
