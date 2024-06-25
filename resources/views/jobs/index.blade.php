<x-layout>
    <div class="space-y-10">
        <section class="text-center pt-6">
            <h1 class="font-bold text-4xl">Let's Find Your Next Job</h1>

            <x-form action="/search" class="mt-6">
                <x-input :label="false" name="q" placeholder="Web Developer..." />
            </x-form>
        </section>

        <section class="pt-10">
            <x-section-heading>Featured Jobs</x-section-heading>

            <div class="grid lg:grid-cols-3 gap-8 mt-6">
                @foreach($featuredJobs as $job)
                    <x-job-cards :job="$job" />
                @endforeach
            </div>
        </section>

        <section>
            <x-section-heading>Tags</x-section-heading>

            <div class="mt-6 space-x-3">
                @foreach($tags as $tag)
                    <x-tag :tag="$tag" />
                @endforeach
            </div>
        </section>

        <section>
            <x-section-heading>Recent Jobs</x-section-heading>

            <div class="mt-6 space-y-6">
                @foreach($jobs as $job)
                    <x-recent-job-card :job="$job" />
                @endforeach
            </div>
        </section>


        <section>
            <x-section-heading>Archived Jobs <h2>({{ $hiddenJobs->count() }})</h2></x-section-heading>

            <div class="mt-6 space-y-6">
                @foreach($hiddenJobs as $hiddenjob)
                    <x-hidden-jobs :job="$hiddenjob" />
                @endforeach
            </div>
        </section>

        {{-- <section>
            <div class="my-8">
                <h2 class="text-2xl font-bold">Archived Jobs ({{ $hiddenJobs->count() }})</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @forelse($hiddenJobs as $hiddenJob)
                        <x-hidden-jobs :job="$hiddenJob" />
                    @empty
                        <p>No archived jobs found.</p>
                    @endforelse
                </div>
            </div>
        </section> --}}
    </div>
</x-layout>
