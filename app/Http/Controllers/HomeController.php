<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $contacts = Contact::where('user_id',Auth::id())->get();
        return view('home',compact('contacts'));
    }
    public function welcome()
    {
        return view('welcome');
    }
    public function changeLang($lang)
    {
        \Session::put(['lang'=>$lang]);
        return redirect()->back();
    }
}
