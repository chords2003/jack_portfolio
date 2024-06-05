<x-layout>

    <section class="text-center pt-6">
        <h1 class="font-bold text-4xl">Edit Job</h1>
    </section>

    <section class="max-w-4xl mx-auto mt-10">

            <form action="{{ route('jobs.update', $job) }}" method="POST">
                @csrf
                @method('PATCH')

                <div class="space-y-6">
                    <x-input label="Title"  name="title" :value="old('title', $job->title)" />
                    <x-input label="URL"  name="url" :value="old('url', $job->url)" />
                    <x-input label="Salary"  name="salary" :value="old('salary', $job->salary)" />
                    <x-input label="Location"  name="location" :value="old('location', $job->location)" />
                    <x-select label="Schedule"  name="schedule" :value="old('schedule', $job->description)">
                        <option>Full Time</option>
                        <option>Part Time</option>
                    </x-select>
                    <x-input label="Tags"  name="tags" :value="old('tags', $job->tags->pluck('name')->implode(','))" />
                </div>

                <div class="mt-6">
                    <x-button>Update Job</x-button>
                    <x-cancel-button href="{{ route('jobs.show', $job) }}">Cancel</x-cancel-button>

                </div>
            </form>

    </section>
</x-layout>
