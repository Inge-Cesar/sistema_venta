<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $totalCategorias = Category::count();
        return view('admin.index', compact('totalCategorias'));
    }
}
