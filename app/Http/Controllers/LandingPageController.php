<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $title = 'Blog Home';
        return view('landingpage.index', compact('title'));
    }

    public function about()
    {
        $title = 'About Xtra';
        return view('landingpage.about', compact('title'));
    }

    public function contact()
    {
        $title = 'Contact Us';
        return view('landingpage.contact', compact('title'));
    }
}
