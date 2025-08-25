<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\Merchandise;

class IndexController extends Controller
{
    public function index()
    {
        $events = Event::all();
        $galleries = Gallery::all();
        $merchs = Merchandise::all();
        return view('index', compact('events', 'galleries', 'merchs'));
    }
}
