@props(['job'])

<x-panel class="flex gap-x-6 relative">
    <div>
        <x-employer-logo :employer="$job->employer"/>
    </div>

    <div class="flex-1 flex flex-col">
        <a href="#"
           class="self-start text-sm text-gray-400 transition-colors duration-300">{{ $job->employer->name }}</a>

        <h3 class="font-bold text-xl mt-3 group-hover:text-blue-800">
            <a href="{{ $job->url }}" target="_blank">
                {{ $job->title }}
            </a>
        </h3>

        <p class="text-sm text-gray-400 mt-auto">{{ $job->salary }}</p>
    </div>

    <div>
        @foreach($job->tags as $tag)
            <x-tag :$tag/>
        @endforeach
    </div>
    @can('is-admin')
        <a href="/jobs/{{ $job->id }}/edit"
           class="absolute bottom-4 right-4 text-white p-2 rounded-full hover:bg-blue-600 transition">
            <i class="fas fa-edit"></i>
        </a>
    @endcan
</x-panel>
