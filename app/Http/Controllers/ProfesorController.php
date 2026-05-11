<?php

namespace App\Http\Controllers;

use App\Models\Profesor;
use Illuminate\View\View;

class ProfesorController extends Controller
{
    /**
     * Display a listing of profesores.
     */
    public function index(): View
    {
        $profesores = Profesor::orderBy('apellidos')
            ->orderBy('nombre')
            ->get();

        return view('profesores.index', compact('profesores'));
    }
}
