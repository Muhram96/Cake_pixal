<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function AboutUs(){
        return view('about');
    }

    public function ContactUs(){
        return view('contact');
    }

    public function View(){
        return view('ToolView.BGRView');
    }
    public function EView(){
        return view('ToolView.EView');
    }
    public function GView(){
        return view('ToolView.GBView');
    }

    public function CView(){
        return view('ToolView.CView');
    }

    public function CPView(){
        return view('ToolView.CPView');
    }
    public function IDView(){
        return view('ToolView.IDView');
    }
    public function CEView(){
        return view('ToolView.CEview');
    }
    public function UnwantedObj()
    {
        return view('ToolView.ORView');
    }
}
