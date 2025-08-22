<?php

namespace App\Models;

use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder as BaseBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class MyJob extends Model
{
    /** @use HasFactory<\Database\Factories\MyJobFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = ['title', 'location', 'description', 'salary', 'experience', 'category'];
    public static array $experience = ['entry', 'intermediate', 'senior'];
    public static array $category = ['IT', 'Finance', 'Sales', 'Marketing'];

    public function employer(): BelongsTo
    {
        return $this->belongsTo(Employer::class);
    }

    public function jobApplications(): HasMany
    {
        return $this->hasMany(JobApplication::class);
    }

    public function hasUserApplied(Authenticatable|User|int $user)
    {
        return
            $this->where('id', $this->id)->whereHas( // find the specific job
                'jobApplications', // take matching job applications for the job_id
                fn($q) => $q->where('user_id', '=', $user->id ?? $user) // check if the given user is a applicant
            )->exists();
    }

    public function scopeFilter(BaseBuilder|EloquentBuilder $query, array $filters): BaseBuilder|EloquentBuilder
    {
        return $query->when($filters['search'] ?? null, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('title', 'like', "%" . $search . "%")
                    ->orWhere('description', 'like', "%" . $search . "%")->orWhereHas('employer', function ($query) use ($search) {
                        $query->where('company_name', 'like', '%' . $search . '%');
                    });
            });  // just searching using text and the where cluse fix the logical operation issue and wont ignore text parameters title and description
        })->when($filters['min_salary'] ?? null, function ($query, $minSalary) {
            $query->where('salary', '>=', $minSalary);
        })->when($filters['max_salary'] ?? null, function ($query, $maxSalary) {
            $query->where('salary', '<=', $maxSalary);
        })->when($filters['experience'] ?? null, function ($query, $experience) {
            $query->where('experience', $experience);
        })->when($filters['category'] ?? null, function ($query, $category) {
            $query->where('category', $category);
        });
    }
}
