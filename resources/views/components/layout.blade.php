<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Portfolio</title>
    @vite(['resources/js/app.js'])
</head>

<body>
    <div>
        <nav>
            <div>
                <a href="">
                    <img src="" alt="">
                </a>
            </div>
            <div>Nav Links bar</div>
            <div>profile</div>
        </nav>
        <main>
            {{ $slot }}
        </main>
    </div>
</body>

</html>
