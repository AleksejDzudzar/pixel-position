<x-layout>
    <x-page-heading>Edit Job</x-page-heading>

    <x-forms.form method="POST" action="/jobs/{{$job->id}}">
        @csrf
        @method('PATCH')
        <x-forms.input label="Title" name="title" value="{{$job->title}}"/>
        <x-forms.input label="Salary" name="salary" value="{{$job->salary}}"/>
        <x-forms.input label="Location" name="location" value="{{$job->location}}"/>

        <x-forms.select label="Schedule" name="schedule" value="{{$job->schedule}}">
            <option>Part Time</option>
            <option>Full Time</option>
        </x-forms.select>

        <x-forms.input label="URL" name="url" value="{{$job->url}}"/>
        <x-forms.checkbox label="Feature (Costs Extra)" name="featured"/>

        <x-forms.divider/>

        <x-forms.input label="Tags (comma separated)" name="tags" placeholder=""/>
        @can('is-admin')
            <x-forms.button>Update</x-forms.button>
        @endcan
    </x-forms.form>
</x-layout>
