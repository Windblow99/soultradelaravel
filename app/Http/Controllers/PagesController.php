<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        return view('pages.index');
    }

    public function about() {
        return view('pages.about');
    }

    public function medicalHome() {
        return view('medical.index');
    }

    public function companionHome() {
        return view('user.index');
    }
}
