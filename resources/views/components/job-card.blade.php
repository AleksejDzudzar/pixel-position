@props(['job'])

<x-panel class="relative flex flex-col text-center">
    <div class="self-start text-sm">{{ $job->employer->name }}</div>

    <div class="py-8">
        <h3 class="group-hover:text-blue-800 text-xl font-bold transition-colors duration-300">
            <a href="{{ $job->url }}" target="_blank">
                {{ $job->title }}
            </a>
        </h3>

        <p class="text-sm mt-4">{{ $job->salary }}</p>
    </div>

    <div class="flex justify-between items-center mt-auto">
        <div>
            @foreach($job->tags as $tag)
                <x-tag :$tag size="small"/>
            @endforeach

        </div>

        <x-employer-logo :employer="$job->employer" :width="42"/>
    </div>

    @can('is-admin')
        <div class="absolute top-0 right-0 p-4">
            <a href="/jobs/{{$job->id}}/edit" class="hover:text-blue-600">
                <i class="fas fa-edit"></i>
            </a>
        </div>
    @endcan

</x-panel>
