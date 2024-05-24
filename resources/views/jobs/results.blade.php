<x-layout>
    <x-page-heading>Search Results</x-page-heading>
    <section>
        <x-section-heading>Recent job search result</x-section-heading>
        <div class="mt-6 space-y-6 ">
            @foreach ($jobs as $job)
                <x-recent-job-card :$job />
            @endforeach
        </div>
    </section>

</x-layout>
