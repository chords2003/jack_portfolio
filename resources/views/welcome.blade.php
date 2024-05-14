<x-layout>
<div class="space-y-10">
    <section>
        <x-section-heading>Featured Jobs</x-section-heading>
        <div class="grid lg:grid-cols-3 gap-8 mt-6">
            <x-job-card />
            <x-job-card />
            <x-job-card />
        </div>
    </section>

    <section>
        <x-section-heading>Tags</x-section-heading>
        <div class="mt-6 space-x-1">
            <x-tag>PHP</x-tag>
            <x-tag>PHP</x-tag>
            <x-tag>PHP</x-tag>
            <x-tag>PHP</x-tag>
            <x-tag>PHP</x-tag>
            <x-tag>PHP</x-tag>
            <x-tag>PHP</x-tag>
            <x-tag>PHP</x-tag>
            <x-tag>PHP</x-tag>
            <x-tag>PHP</x-tag>
        </div>
    </section>

    <section>
        <x-section-heading>Recent Jobs</x-section-heading>
        <div class="mt-6 space-y-6">
            <x-recent-job-card />
            <x-recent-job-card />
            <x-recent-job-card />

    </section>
</div>

</x-layout>
