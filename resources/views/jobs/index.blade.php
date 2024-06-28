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
            <div class= "grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mt-6 rounded bg-black" style="grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));">
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

        <section class=" bg-black">
            <x-section-heading>Recent Jobs</x-section-heading>

            <div class="mt-6 space-y-6   rounded">
                @forelse($recentJobs as $job)
                    <x-recent-job-card :job="$job" />
                @empty
                    <p class="text-white bg-black">
                        There are no recent jobs at the moment!.
                </p>
                @endforelse
            </div>
        </section>

        <section class=" rounded">
            <x-section-heading>Archived Jobs ({{ $hiddenJobs->count() }})</x-section-heading>

            <div class="mt-6 space-y-6 rounded ">
                @forelse($hiddenJobs as $job)
                    <x-hidden-jobs :job="$job" />
                @empty
                    <p>
                        There are no archived jobs at the moment!.
                    </p>
                @endforelse
            </div>
        </section>
    </div>
</x-layout>
