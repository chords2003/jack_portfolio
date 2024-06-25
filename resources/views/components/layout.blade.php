<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Portfolio</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.0/dist/cdn.min.js"></script>
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
            @auth
            <a href="/jobs/create">Post a Job</a>
            <div class="relative ml-3 ">
                <div>
                    <button type="button" class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                        <span class="absolute -inset-1.5"></span>
                        <span class="sr-only">Open user menu</span>
                        <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                        <div>
                            <h6 class="m-2">{{ Auth::user()->name }}</h6>
                        </div>
                    </button>
                </div>
                <div id="user-menu" class="absolute right-0  z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none hidden" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                    <a href="#" class="block px-4 py-2 text-sm  border border-transparent hover:bg-gray-300 text-gray-700 " role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
                            <a href="#" class="block px-4 py-2 text-sm border border-transparent hover:bg-gray-300 text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>
                    <form action="/logout" method="post" class="block px-4 py-2 text-sm border border-transparent hover:bg-gray-300 text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2" >
                        @csrf
                        @method('DELETE')
                        <button type="submit">Logout</button>
                    </form>
                </div>
            </div>
                @endauth

                @guest
                <div class="space-x-6 font-bold">
                    <a href="/register">Sign Up</a>
                    <a href="/login">Log In</a>
                </div>
                @endguest
        </nav>
        <main class="mt-10 max-w-[986px] mx-auto">
            {{ $slot }}
        </main>
    </div>
</body>

</html>


<script>
    const userMenuButton = document.getElementById('user-menu-button');
    const userMenu = document.getElementById('user-menu');

    userMenuButton.addEventListener('click', () => {
      userMenu.classList.toggle('hidden');
    });

    document.addEventListener('click', (event) => {
      const isClickInside = userMenuButton.contains(event.target) || userMenu.contains(event.target);

      if (!isClickInside && !userMenu.classList.contains('hidden')) {
        userMenu.classList.add('hidden');
      }
    });
  </script>
