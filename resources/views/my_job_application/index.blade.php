<x-layout>
    <x-breadcrumbs class="mb-4" :links="['My Job Applications' => '#']" />

    @forelse ($applications as $item)
        <x-job-card :job="$item->job">
            <div class="flex items-center justify-between text-xs">
                <div>
                    <div>Applied: {{ $item->created_at->diffForHumans() }} </div>
                    <div>Your Salary: {{ number_format($item->expected_salary) }}</div>
                    <div>Others {{ Str::plural('applicant', $item->job->job_applications_count - 1) }}:
                        {{ $item->job->job_applications_count - 1 }}</div>
                    <div>Avg Salary: {{ number_format($item->job->job_applications_avg_expected_salary) }} </div>
                </div>
                <div>

                </div>
            </div>
        </x-job-card>
    @empty
        <div>
            You have not applied to any job yet
        </div>
    @endforelse
</x-layout>
