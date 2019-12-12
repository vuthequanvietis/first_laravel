<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
class HomeController extends Controller
{
    public function changeLang($lang)
    {
        \Session::put(['lang'=>$lang]);
        return redirect()->back();
    }
}
