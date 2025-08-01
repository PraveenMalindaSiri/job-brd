<?php

use App\Http\Controllers\MyJobController;
use Illuminate\Support\Facades\Route;

Route::get('', fn() => to_route('jobs.index'));

Route::resource('jobs', MyJobController::class);
