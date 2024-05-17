@props(['job'])

<x-panel class="flex flex-col text-center">
    <div class="self-start text-sm">{{ $job->employer }}</div>
    <div class="py-8 ">
        <h3 class="group-hover:text-blue-800 text-xl font-bold transition-colors duration-300"> <!-- This is how we apply a hover effect -->
           {{ $job->title }}
        </h3>
        <p class="text-sm mt-4">
            {{ $job->salary}}
        </p>
    </div>
    <div class="flex justify-between items-center mt-auto">
        <div>
            @foreach ($job->tags as $tag)
                <x-tag :$tag size="small" /> <!-- This is how we pass props to a component -->
            @endforeach
        </div>

    <x-employer-logo :width="42" /> <!-- This is how we pass props to a component -->
</div>
</x-panel>

