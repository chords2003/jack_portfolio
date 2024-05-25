<x-layout>
    <x-page-heading>Create a new job</x-page-heading>
    <x-form action="/jobs" method="POST" class="mt-6">
        <x-input :label="false" name="title" placeholder="Title" />
        <x-input :label="false" name="salary" placeholder="Salary" />
        <x-input :label="false" name="location" placeholder="Location" />
        <x-select :label="false" name="schedule">
            <option value="Full-time">Full-time</option>
            <option value="Part-time">Part-time</option>
            <option value="Contract">Contract</option>
        </x-select>
        <x-input :label="false" name="url" placeholder="https://acme.com/jobs/ceo-wanted" />
        <x-checkbox :label="false" name="feature" />

        <x-input :label="false" name="tags" placeholder="Laracast, Video, education" />
        <x-button>Publish Job</x-button>
    </x-form>
</x-layout>
