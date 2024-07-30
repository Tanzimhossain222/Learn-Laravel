<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {
    return view('jobs',  [
        'jobs' => [
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
        ],
    ]);
});

Route::get('/jobs/{id}', function ($id) {
    $jobs = [
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


    $job = Arr::first($jobs, fn ($job) => $job["id"] == $id);

    return view('job', ['job' => $job]);
});




Route::get('/about', function () {
    return view('about');
});


Route::get('/contact', function () {
    return view('contact');
});
