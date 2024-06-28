@props(['job'])

<x-panel id="job-{{ $job->id }}" class=" bg-black flex gap-x-6"
    x-data="{ hidden: {{ $job->hidden ? 'true' : 'false' }}, featured: {{ $job->featured ? 'true' : 'false' }} }"
    x-show="hidden"
    @toggle-visibility.window="if ($event.detail.jobId === {{ $job->id }}) {
        hidden = $event.detail.hidden;
        featured = $event.detail.featured;
        updateJobVisibility($event.detail);
    }">
    <div>
        <x-employer-logo :employer="$job->employer" />
    </div>

    <div class="flex-1 flex flex-col ">
        <a href="#" class="self-start text-sm text-gray-400 transition-colors duration-300">{{ $job->employer->name }}</a>

        <h3 class="font-bold text-xl mt-3 group-hover:text-blue-800">
            <a href="{{ $job->url }}" target="_blank">
                {{ $job->title }}
            </a>
        </h3>

        <p class="text-sm text-gray-900 mt-auto">{{ $job->salary }}</p>
    </div>

    <div class="flex justify-between items-center mt-auto">
        <div>
            @foreach($job->tags as $tag)
                <x-tag :tag="$tag" size="small" />
            @endforeach
        </div>


    </div>

        <x-dropdown :job="$job" />

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
