<x-layout>
    <x-breadcrumbs :links="['My Jobs' => route('my-job.index'), 'Edit Job' => '#']" class="mb-4" />

    <x-card>
        <form action="{{ route('my-job.update', $job) }}" method="post">
            @csrf
            @method('PUT')

            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <x-label for="title" :required="true">Job Title</x-label>
                    <x-text-input name="title" :value="$job->title" />
                </div>

                <div>
                    <x-label for="location" :required="true">Job Location</x-label>
                    <x-text-input name="location" :value="$job->location" />
                </div>

                <div class="col-span-2">
                    <x-label for="salary" :required="true">Job Salary</x-label>
                    <x-text-input name="salary" type="number" :value="$job->salary" />
                </div>

                <div class="col-span-2">
                    <x-label for="description" :required="true">Job Description</x-label>
                    <x-text-input name="description" type="textarea" :value="$job->description" />
                </div>

                <div>
                    <x-label for="experience" :required="true">Experience</x-label>

                    <x-radio-group name="experience" :value="$job->experience" :allOpt="false" :options="array_combine(
                        array_map('ucfirst', \App\Models\MyJob::$experience),
                        \App\Models\MyJob::$experience,
                    )" />
                </div>

                <div>
                    <x-label for="category" :required="true">Category</x-label>

                    <x-radio-group name="category" :options="\App\Models\MyJob::$category" :allOpt="false" :value="$job->category" />
                </div>
            </div>
            <x-button class="w-full py-4">Update Job</x-button>
        </form>
    </x-card>
</x-layout>
