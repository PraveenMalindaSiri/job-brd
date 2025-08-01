<x-layout>
    <x-breadcrumbs class="mb-4" :links="['Jobs' => route('jobs.index')]" />

    <x-card class="mb-4 text-sm">
        <form action="{{ route('jobs.index') }}" method="GET">
            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <div>Search</div>
                    <x-text-input name="search" value="{{ request('search') }}" placeholder="Seach for any text" />
                </div>
                <div>
                    <div>Salary</div>
                    <div class="flex space-x-2">
                        <x-text-input name="min_salary" value="{{ request('min_salary') }}" placeholder="From" />
                        <x-text-input name="max_salary" value="{{ request('max_salary') }}" placeholder="To" />
                    </div>
                </div>
                <div>
                    <div>Experience</div>
                    <div>
                        <label for="experience" class="flex items-center">
                            <input type="radio" name="experience" id="" value="" $@checked(!request("experience"))>
                            <span class="ml-2">All</span>
                        </label>

                        <label for="experience" class="flex items-center">
                            <input type="radio" name="experience" id="" value="entry">
                            <span class="ml-2">Entry</span>
                        </label>

                        <label for="experience" class="flex items-center">
                            <input type="radio" name="experience" id="" value="intermediate">
                            <span class="ml-2">Intermediate</span>
                        </label>

                        <label for="experience" class="flex items-center">
                            <input type="radio" name="experience" id="" value="senior">
                            <span class="ml-2">Senior</span>
                        </label>
                    </div>
                </div>
            </div>
            <button class="btn w-full">Filter</button>
        </form>
    </x-card>

    <div>
        @foreach ($jobs as $job)
            <x-job-card :job="$job">
                <x-link-button :href="route('jobs.show', $job)">
                    Show more...
                </x-link-button>
            </x-job-card>
        @endforeach
    </div>

</x-layout>
