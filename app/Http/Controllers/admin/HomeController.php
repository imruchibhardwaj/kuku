<?php

// Admin HomeController
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Display the admin dashboard
        return view('home');
    }

    public function createUser()
    {
        // Show the form for creating a user
        return view('admin.createUser');
    }

    public function storeUser(Request $request)
    {
        // Store a new user
        // Validate and create the user
    }

    public function createVendor()
    {
        // Show the form for creating a vendor
        return view('admin.createVendor');
    }

    public function storeVendor(Request $request)
    {
        // Store a new vendor
        // Validate and create the vendor
    }
}

