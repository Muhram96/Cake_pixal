<?php

namespace App\Http\Controllers;
use App\Models\CreditHistory;
use App\Models\User;
use App\Models\UserCreditHistory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function Dashboard(){
        $now = Carbon::now();
        $user_id = Auth::id();
        $data = UserCreditHistory::where('user_id', $user_id)->paginate(4);;
         $token_buy =UserCreditHistory::where('user_id', $user_id)
            ->sum('credit_buy');
         $token_used= CreditHistory::where('user_id', $user_id)
            ->sum('token_consumed');
         $token =  $token_buy- $token_used;
        $data = UserCreditHistory::paginate(4);
        return  view('dashboard', ['data' => $data, 'token'=>$token]);
    }

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
