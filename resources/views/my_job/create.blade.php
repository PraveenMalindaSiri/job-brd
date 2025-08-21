<x-layout>
    <x-breadcrumbs :links="['My Jobs' => route('my-job.index'), 'Create' => '#']" class="mb-4" />

    <x-card>
        <form action="{{ route('my-job.store') }}" method="post">
            @csrf

            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <x-label for="title" :required="true">Job Title</x-label>
                    <x-text-input name="title" />
                </div>

                <div>
                    <x-label for="location" :required="true">Job Location</x-label>
                    <x-text-input name="location" />
                </div>

                <div class="col-span-2">
                    <x-label for="salary" :required="true">Job Salary</x-label>
                    <x-text-input name="salary" type="number" />
                </div>

                <div class="col-span-2">
                    <x-label for="description" :required="true">Job Description</x-label>
                    <x-text-input name="description" type="textarea" />
                </div>

                <div>
                    <x-label for="experience" :required="true">Experience</x-label>

                    <x-radio-group name="experience" :value="old('experience')" :allOpt="false" :options="array_combine(
                        array_map('ucfirst', \App\Models\MyJob::$experience),
                        \App\Models\MyJob::$experience,
                    )" />
                </div>

                <div>
                    <x-label for="category" :required="true">Category</x-label>

                    <x-radio-group name="category" :options="\App\Models\MyJob::$category" :allOpt="false" :value="old('category')" />
                </div>
            </div>
            <x-button class="w-full py-4">Create Job</x-button>
        </form>
    </x-card>
</x-layout>
