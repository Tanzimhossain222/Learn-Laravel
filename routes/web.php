<?php

use App\Models\Job;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

// index
Route::get('/jobs', function () {
    // $jobs = Job::with('employer')->paginate(3);
    $jobs = Job::with('employer')->latest()->simplePaginate(5);

    return view('jobs.index',  [
        'jobs' => $jobs,
    ]);
});

// create 
Route::get('/jobs/create', function () {
    return view('jobs.create');
});

// show
Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);

    return view('jobs.show', ['job' => $job]);
});

// store
Route::post('/jobs', function () {

    request()->validate([
        'title'=> ['required','string','min:3'],
        'salary' => ['required'],
    ]);
   
    Job::create([
        'title'=> request('title'),
        'salary'=> request('salary'),
        'employer_id'=> 1,
    ]);

    return redirect('/jobs');
});


// edit
Route::get('/jobs/{id}/edit', function ($id) {
    $job = Job::find($id);

    return view('jobs.edit', ['job' => $job]);
});

// Update
Route::patch('/jobs/{id}', function ($id) {
    //validate
    request()->validate([
        'title'=> ['required','string','min:3'],
        'salary' => ['required'],
    ]);

    // authorize

    // update
    $job = Job::findOrFail($id); 


    $job->update([
        'title'=> request('title'),
        'salary'=> request('salary'),
    ]);

    // redirect
    return redirect('/jobs/' . $job->id);
});

// delete
Route::delete('/jobs/{id}', function ($id) {

    // authorize

    // delete 
    $job = Job::findOrFail($id);
    $job->delete();

    return redirect('/jobs');


});


Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});
