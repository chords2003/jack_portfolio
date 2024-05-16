@props(['job'])

<x-panel class="flex flex-col text-center">
    <div class="self-start text-sm">Laracast</div>
    <div class="py-8 ">
        <h3 class="group-hover:text-blue-800 text-xl font-bold transition-colors duration-300"> <!-- This is how we apply a hover effect -->
            Senior Developer
        </h3>
        <p class="text-sm mt-4">
            Full Time - From $60,000 - $80,000
        </p>
    </div>
    <div class="flex justify-between items-center mt-auto">
        <div>
            <x-tag size="small">Manager</x-tag>
            <x-tag size="small">Backend</x-tag>
            <x-tag size="small">Frontend</x-tag>

        </div>

    <x-employer-logo :width="42" /> <!-- This is how we pass props to a component -->
</div>
</x-panel>

