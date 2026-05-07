<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth.basic')->get('/usuario', function (Request $request) {
    return response()->json([
        'mensaje' => 'Acceso permitido',
        'usuario' => $request->user()
    ]);
});