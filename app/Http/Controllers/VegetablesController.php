<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vegetable;
class VegetablesController extends Controller
{
    public function index()
    {
        $vegetables = Vegetable::all();
        return view('vegetables.index', compact('vegetables'));
    }
    public function show(Vegetable $vegetable)
    {
        return view('vegetables.show', compact('vegetable'));
    }
}
