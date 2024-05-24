<x-layout>
    <x-page-heading>Log In</x-page-heading>

    <x-form method="POST" action="/login">
        <x-input label="Email" name="email" type="email" />
        <x-input label="Password" name="password" type="password" />

        <x-button>Log In</x-button>
    </x-form>
</x-layout>
