@props(['job'])

<x-panel class="flex gap-x-6">
<div>
    <x-employer-logo />
</div>
    <div class="flex-1 flex flex-col">
        <a href="" class="self-start text-sm text-gray-500">{{ $job->employer }}</a>
        <h3 class=" font-bold text-xl mt-3 group-hover:text-blue-800 transition-colors duration-300">
            {{ $job->title }}
        </h3>
        <p class=" text-sm text-gray-400 mt-auto">
            {{ $job->salary }}
        </p>
    </div>

    <div class="flex justify-between items-center mt-auto">
        <div>
            @foreach ($job->tags as $tag)
                <x-tag :$tag /> <!-- This is how we pass props to a component -->
            @endforeach
        </div>
    </div>
</x-panel>



