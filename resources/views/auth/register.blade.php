<x-layout>
    <x-page-heading>Register</x-page-heading>

    <x-form method="POST" action="/register" enctype=" multipart/form-data">
        @csrf
        <x-input label="Name" name="name" />
        <x-input label="Email" name="email" type="email" />
        <x-input label="Password" name="password" type="password" />
        <x-input label="Password Confirmation" name="password_confirmation" type="password" />

        <x-divider />

        <x-input label="Employer Name" name="employer" />
        <x-input label="Employer Logo" name="logo" type="file" />

        <x-button>Create Account</x-button>
    </x-form>

</x-layout>
