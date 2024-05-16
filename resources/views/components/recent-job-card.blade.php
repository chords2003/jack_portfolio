@props(['job'])

<x-panel class="flex gap-x-6">
<div>
    <x-employer-logo />
</div>
    <div class="flex-1 flex flex-col">
        <a href="" class="self-start text-sm text-gray-500">Laracast</a>
        <h3 class=" font-bold text-xl mt-3 group-hover:text-blue-800 transition-colors duration-300">
            Senior PHP Developer
        </h3>
        <p class=" text-sm text-gray-400 mt-auto">
            Full-time - Remote $60,000 - $80,000
        </p>
    </div>

    <div class="flex justify-between items-center mt-auto">
        <div>
           <x-tag>PHP</x-tag>
           <x-tag>Laracast</x-tag>
           <x-tag>JAVA</x-tag>
        </div>
    </div>
</x-panel>
