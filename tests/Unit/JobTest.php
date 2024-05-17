<?php

use App\Models\Employee;
use App\Models\Job;

// it('belongs to an employer', function () {
//     $employer = Employee::factory()->create();
//     $job = Job::factory()->create([
//         'employee_id' => $employer->id,
//     ]);

//     expect($job->employee->is($employer))->toBeTrue();
// });

it('can have tags', function () {
    $job = Job::factory()->create();

    $job->tag('Frontend');

    expect($job->tags)->toHaveCount(1);
});
