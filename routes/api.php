<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EntityController;

Route::post('/hunt-entities', [EntityController::class, 'huntEntities']);