<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $title = 'Blog Home';
        $blog = Blog::all();
        $author = User::all();
        return view('landingpage.index', compact('title'), [
            "blog" => $blog,
            "author" => $author
        ]);
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
