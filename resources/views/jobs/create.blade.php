<x-layout>
    <x-page-heading>Create a new job</x-page-heading>
    <x-form action="/jobs" method="POST" class="mt-6">
        <x-input label="Title" name="title" placeholder="Title" />
        <x-input label="Salary" name="salary" placeholder="Salary" />
        <x-input label="Location" name="location" placeholder="Location" />
        <x-select label="Schedule" name="schedule">
            <option>Full Time</option>
            <option>Part Time</option>
        </x-select>
        <x-input label="URL" name="url" placeholder="https://acme.com/jobs/ceo-wanted" />
        <x-checkbox label="Feature (Cost Extra)" name="feature" />
        <x-divider />
        <x-input label="Tags (comma separated)" name="tags" placeholder="Laracast, Video, education" />
        <x-button>Publish Job</x-button>
    </x-form>
</x-layout>
