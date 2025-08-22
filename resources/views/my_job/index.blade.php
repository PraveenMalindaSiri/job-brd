<x-layout>
    <x-breadcrumbs :links="['My Jobs' => '#']" class="mb-4" />

    <div class="mb-8 text-right">
        <x-link-button :href="route('my-job.create')">Add new</x-link-button>
    </div>

    @forelse ($jobs as $job)
        <x-job-card :job="$job">
            @forelse ($job->jobApplications as $application)
                <div class="mb-4 flex items-center justify-between">
                    <div>
                        <div>
                            <div> {{ $application->user->name }} </div>
                        </div>
                        <div>
                            Applied: {{ $application->created_at->diffForHumans() }}
                        </div>
                        <div>
                            CV
                        </div>
                    </div>
                    <div>
                        ${{ number_format($application->expected_salary) }}
                    </div>
                </div>
            @empty
                <div>No Applications</div>
            @endforelse

            <div class="flex space-x-2">
                <x-link-button href="{{ route('my-job.edit', $job) }}">Edit</x-link-button>

                <form action="{{ route('my-job.destroy', $job) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <x-button>DELETE</x-button>
                </form>
            </div>
        </x-job-card>
    @empty
        No Jobs
    @endforelse

</x-layout>
