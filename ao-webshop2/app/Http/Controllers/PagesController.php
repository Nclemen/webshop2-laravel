<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{

    public function index(){
        $title = 'welcome to the ao-webshop2';

        return view('pages.index')->with([
            'title'=>$title
        ]);
    }


}
