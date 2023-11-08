<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function change($locale)
    {
         App::setLocale($locale);

         Session::put('locale', $locale);
//        dd($app);
        return redirect()->back();
    }
}
