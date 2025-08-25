<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Gallery;

class IndexController extends Controller
{
    public function index()
    {
        $events = Event::all();
        $galleries = Gallery::all();
        return view('index', compact('events', 'galleries'));
    }
}
