@props(['job'])

<x-panel class="flex flex-col text-center">

    <!--Dropdown menu option -->
    <div class="relative flex justify-between items-start">
        <div class="self-start text-sm">{{ $job->employer->name }}</div>
        <div class="relative">
            <!-- Dropdown Trigger -->
            <button class="text-gray-600 hover:text-gray-800 focus:outline-none focus:ring" id="dropdownMenuButton-{{ $job->id }}">
                ...
            </button>

            <!-- Dropdown Menu -->
            <div id="dropdownMenu-{{ $job->id }}" class="hidden absolute right-0 mt-2 w-48 bg-white border rounded-lg shadow-lg z-10">
                <a href="{{ route('jobs.edit', $job) }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Edit</a>
                <form action="{{ route('jobs.destroy', $job) }}" method="POST" class="block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full text-left px-4 py-2 text-gray-800 hover:bg-gray-200">Delete</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('[id^="dropdownMenuButton-"]').forEach(button => {
            button.addEventListener('click', function() {
                const menuId = this.id.replace('Button', '');
                const dropdownMenu = document.getElementById(menuId);
                dropdownMenu.classList.toggle('hidden');
            });
        });

        document.addEventListener('click', function(event) {
            document.querySelectorAll('[id^="dropdownMenu-"]').forEach(menu => {
                if (!menu.contains(event.target) && !document.querySelector(`[id="dropdownMenuButton-${menu.id.split('-')[1]}"]`).contains(event.target)) {
                    menu.classList.add('hidden');
                }
            });
        });
    </script>

    <div class="py-8">
        <h3 class="group-hover:text-blue-800 text-xl font-bold transition-colors duration-300">
            <a href="{{ $job->url }}" target="_blank"> <!--target="_blank" will open the link in a new tab -->
                {{ $job->title }}
            </a>
        </h3>
        <p class="text-sm mt-4">{{ $job->salary }}</p>
    </div>

    <div class="flex justify-between items-center mt-auto">
        <div>
            @foreach($job->tags as $tag)
                <x-tag :$tag size="small" />
            @endforeach
        </div>

        <x-employer-logo :employer="$job->employer" :width="42" />
    </div>


</x-panel>


