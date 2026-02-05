<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;

class DashboardAuthorController extends Controller
{
    public function index()
    {
        return view('dashboard.administrator.author');
    }
}
