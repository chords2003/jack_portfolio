@props(['job'])

<x-panel x-data="{ open: false, hidden: {{ $job->hidden ? 'true' : 'false' }}, dropdown: { hideJob() { } } }" x-show="!hidden" class="flex flex-col text-center">    <div class="relative flex justify-between items-start">
        <div class="self-start text-sm">{{ $job->employer->name }}</div>
        {{-- <x-dropdown :$job /> --}}

        <div  class="relative ml-3 ">
            @auth
            <div>
                <button type="button" class="relative flex max-w-xs items-center rounded-full text-sm  focus:ring-offset-gray-800"
                    @click="open = !open" aria-expanded="false" aria-haspopup="true">
                    <span class="absolute -inset-1.5"></span>
                    <span class="sr-only">Open user menu</span>
                    ...
                </button>
            </div>
                <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-24 bg-white border rounded-lg shadow-lg z-10">
                    <a href="{{ route('jobs.edit', $job) }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Edit</a>
                    <form action="{{ route('jobs.destroy', $job) }}" method="POST" class="block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full  px-4 py-2 text-gray-800 hover:bg-gray-200">Delete</button>
                    </form>
                    <a href="#" @click.prevent="hideJob()"  class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Hide</a>
                </div>
            @endauth

        </div>
    </div>

    <div class="py-8">
        <h3 class="group-hover:text-blue-800 text-xl font-bold transition-colors duration-300">
            <a href="{{ $job->url }}" target="_blank">
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


<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('dropdown', () => ({
            open: false,
            hidden: {{ $job->hidden ? 'true' : 'false' }},
            hideJob() {
                console.log('hideJob method called');
                // Add your hideJob logic here
                fetch('{{ route('jobs.hide', ['job' => $job->id]) }}', {
                    method: 'PUT',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ hidden: !this.hidden })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        this.hidden = !this.hidden;
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            }
        }));
    });
</script>






