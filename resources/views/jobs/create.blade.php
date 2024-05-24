<x-layout>
    <x-page-heading>Create a new job</x-page-heading>
    <x-form action="/jobs" method="POST" class="mt-6">
        <x-input :label="false" name="title" placeholder="Title" />
        <x-input :label="false" name="salary" placeholder="Salary" />
        <x-input :label="false" name="location" placeholder="Location" />
        <x-input :label="false" name="tags" placeholder="Tags" />
        <x-button>Create Job</x-button>
    </x-form>
</x-layout>
