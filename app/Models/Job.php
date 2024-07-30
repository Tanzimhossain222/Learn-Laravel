<?php

namespace App\Models;

use Illuminate\Support\Arr;

class Job
{
    public static function all(): array
    {
        return [
            ['id' => 1, 'title' => 'Director', 'salary' => '$50,000'],
            ['id' => 2, 'title' => 'Programmer', 'salary' => '$150,000'],
            ['id' => 3, 'title' => 'Teacher', 'salary' => '$30,000'],
            ['id' => 4, 'title' => 'Designer', 'salary' => '$70,000'],
            ['id' => 5, 'title' => 'Engineer', 'salary' => '$100,000'],
            ['id' => 6, 'title' => 'Doctor', 'salary' => '$200,000'],
            ['id' => 7, 'title' => 'Nurse', 'salary' => '$40,000'],
            ['id' => 8, 'title' => 'Accountant', 'salary' => '$60,000'],
            ['id' => 9, 'title' => 'Manager', 'salary' => '$80,000'],
            ['id' => 10, 'title' => 'Secretary', 'salary' => '$20,000'],
        ];
    }

    public static function find(int $id): array
    {
        $job = Arr::first(static::all(), fn ($job) => $job["id"] == $id);

        if (!$job) {
            abort(404);
        }

        return $job;
    }
};
