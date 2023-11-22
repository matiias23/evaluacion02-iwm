<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;

class ProductController extends Controller
{
    public function index()
    {
        return response()->json(Product::with('user')->orderBy('id', 'desc')->get());
    }



}
