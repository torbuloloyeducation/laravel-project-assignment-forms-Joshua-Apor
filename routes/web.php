<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome', [
    'greeting' => 'Hello, World!',
    'name' => 'John Doe',
    'age' => 30,
    'tasks' => [
        'Learn Laravel',
        'Build a project',
        'Deploy to production',
    ],
]);

Route::view('/about', 'about');
Route::view('/contact', 'contact');

Route::get('/formtest', function () {
    $emails = session()->get('emails', []);

    return view('formtest', [
        'emails' => $emails,
    ]);
});

Route::post('/formtest', function () {
    $validated = request()->validate([
        'email' => 'required|email'
    ]);

    $emails = session()->get('emails', []);

    if (count($emails) >= 5) {
        session()->flash('success', 'Emails limit reached (Only 5 max).');
        return redirect('/formtest');
    }

    if (!in_array($validated['email'], $emails)) {
        session()->push('emails', $validated['email']);
        session()->flash('success', 'Email added successfully.'); 
    } else {
        session()->flash('success', 'Email already exists.');
    }

    return redirect('/formtest');
});

Route::get('/delete-emails', function(){
    session()->forget('emails');
    return redirect('/formtest');
});

Route::view('/services', 'components.services');
Route::view('/showcases', 'components.showcases');
Route::view('/blog', 'components.blog');

use Illuminate\Http\Request;

Route::post('/formtest/delete', function (Request $request) {
    $index = $request->input('index'); 

    $emails = session()->get('emails', []);

    if (isset($emails[$index])) {
        unset($emails[$index]);
        $emails = array_values($emails); 
        session()->put('emails', $emails);
    }

    return redirect('/formtest');
});

