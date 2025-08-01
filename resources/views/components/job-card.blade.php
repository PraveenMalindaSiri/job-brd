 <x-card class="m-5">
     <div class="flex justify-between mb-3">
         <h2 class="text-xl font-medium">{{ $job->title }}</h2>
         <p class="text-slate-500"> ${{ number_format($job->salary) }} </p>
     </div>
     <div class="flex justify-between text-sm text-slate-500 items-center">
         <div class="flex space-x-3">
             <p>Name</p>
             <p>{{ $job->location }}</p>
         </div>
         <div class="flex text-xs space-x-2">
             <x-tag> {{ Str::ucfirst($job->experience) }} </x-tag>
             <x-tag> {{ $job->category }} </x-tag>
         </div>
     </div>

     {{ $slot }}
 </x-card>
