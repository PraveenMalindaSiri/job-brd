<x-layout>
    <x-breadcrumbs class="mb-4" :links="['My Job Applications' => '#']" />

    @forelse ($applications as $item)
        <x-job-card :job="$item->job">
            <div class="flex items-center justify-between text-xs mt-4">
                <div>
                    <div>Applied: {{ $item->created_at->diffForHumans() }} </div>
                    <div>Your Salary: {{ number_format($item->expected_salary) }}</div>
                    <div>Others {{ Str::plural('applicant', $item->job->job_applications_count - 1) }}:
                        {{ $item->job->job_applications_count - 1 }}</div>
                    <div>Avg Salary: {{ number_format($item->job->job_applications_avg_expected_salary) }} </div>
                </div>

                <div>
                    <form action="{{ route('my-job-application.destroy', $item) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <x-button>Cancel</x-button>
                    </form>
                </div>
            </div>
        </x-job-card>
    @empty
        <div class="rounded-md border border-dashed p-4 text-center">
            <p class="text-center">You have not applied to any job yet</p>
            <a href="{{ route('jobs.index') }}" class="hover:text-blue-600">Find Jobs</a>
        </div>
    @endforelse
</x-layout>
