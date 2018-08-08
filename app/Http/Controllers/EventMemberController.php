<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventMember;
use Illuminate\Http\Request;

class EventMemberController extends Controller
{
    public function index()
    {
        $EventMember = EventMember::all();
        return view('EventMember/index', compact('EventMember'));
    }
    public function show(EventMember $EventMember)
    {
        return view('EventMember/show',compact('EventMember'));
    }
}
