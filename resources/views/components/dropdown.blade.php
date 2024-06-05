@props(['job'])

<div x-data="{ open: false, hidden: {{ $job->hidden ? 'true' : 'false' }} }" x-show="!hidden" class="relative ml-3 ">
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
            <a href="#" @click.prevent="hideJob()" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Hide</a>
        </div>
    @endauth

</div>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('panel', () => ({
            open: false,
            hidden: {{ $job->hidden ? 'true' : 'false' }},
            hideJob() {
                fetch('{{ route('jobs.hide', ['job' => $job->id]) }}', {
                    method: 'PUT',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ hidden: !this.hidden }) // Send the toggled state
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        this.hidden = !this.hidden; // Toggle the hidden state
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            }
        }));
    });
</script>
