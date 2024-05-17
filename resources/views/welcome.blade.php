<x-layout>
<div class="space-y-10">

    <section class="text-center pt-6">
        <h1 class="font-bold text-4xl">Find your next job</h1>
        <form class="pt-6" action="">
            <input  placeholder="Web Developer.."  type="text" class="bg-white/5 border border-white/10 w-full max-w-xl rounded-xl px-5 py-4">
        </form>
    </section>

    <section>
        <x-section-heading>Featured Jobs</x-section-heading>
        <div class="grid lg:grid-cols-3 gap-8 mt-6">
            <x-job-card />
            <x-job-card />
            <x-job-card />
        </div>
    </section>

    <section>
        <x-section-heading>Tags</x-section-heading>
        <div class="mt-6 space-x-1">
            <x-tag>PHP</x-tag>
            <x-tag>PHP</x-tag>
            <x-tag>PHP</x-tag>
            <x-tag>PHP</x-tag>
            <x-tag>PHP</x-tag>
            <x-tag>PHP</x-tag>
            <x-tag>PHP</x-tag>
            <x-tag>PHP</x-tag>
            <x-tag>PHP</x-tag>
            <x-tag>PHP</x-tag>
        </div>
    </section>

    <section>
        <x-section-heading>Recent Jobs</x-section-heading>
        <div class="mt-6 space-y-6 ">
            <x-recent-job-card />
            <x-recent-job-card />
            <x-recent-job-card />
        </div>

    </section>
    <section>
        <div class="mt-6 space-y-6">
            <x-panel class="flex gap-x-6">
                <div>
                    <x-employer-logo />
                </div>
                <div class="flex-1 flex flex-col">
                    <a href="" class="self-start text-sm text-gray-500">Laracast</a>
                    <h3 class=" font-bold
                    text-xl mt-3 group-hover:text-blue-800 transition-colors duration-300">
                        Senior Python Developer
                    </h3>
                    <p class=" text-sm text-gray-400 mt-auto">
                        Full-time - Remote $160,000 - $180,000
                    </p>
                </div>

            </x-panel>

        </div>
    </section>

</div>

</x-layout>
