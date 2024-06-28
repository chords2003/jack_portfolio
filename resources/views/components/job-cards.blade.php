@props(['job'])

<x-panel id="job-{{ $job->id }}" class="flex flex-col text-center"
    x-data="{ hidden: {{ $job->hidden ? 'true' : 'false' }}, featured: {{ $job->featured ? 'true' : 'false' }} }"
    x-show="true"
    @toggle-visibility.window="if ($event.detail.jobId === {{ $job->id }}) {
        hidden = $event.detail.hidden;
        featured = $event.detail.featured;
        updateJobVisibility($event.detail);
    }">
    <div class="relative flex justify-between items-start">
        <div class="self-start text-sm">{{ $job->employer->name }}</div>
        <x-dropdown :job="$job" />
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
                <x-tag :tag="$tag" size="small" />
            @endforeach
        </div>

        <x-employer-logo :employer="$job->employer" :width="42" />
    </div>

    <button @click="hidden = !hidden; $dispatch('toggle-visibility', { jobId: {{ $job->id }}, hidden: hidden, featured: featured })"
        class="mt-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600"
        x-text="hidden ? 'Show job' : 'Save job'">
    </button>
</x-panel>

<script>
function updateJobVisibility(detail) {
    fetch(`/jobs/${detail.jobId}/hide`, {
        method: 'PUT',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ hidden: detail.hidden, featured: detail.featured })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            console.log(`Job ${detail.jobId} visibility updated`);
            // Refresh the page to show updated data
            window.location.reload();
        } else {
            console.error('Failed to update job visibility');
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}
</script>
