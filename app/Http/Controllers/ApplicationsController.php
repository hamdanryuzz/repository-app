<?php

namespace App\Http\Controllers;

use App\Models\Applications;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ApplicationsController extends Controller
{
    public function index()
    {
        $applications = Applications::all();
        return view('applications', compact('applications'));
    }
}
