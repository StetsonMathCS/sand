<?php


namespace App\Http\Controllers;


use Illuminate\Support\Facades\Log;

class PagesController
{


    public function home(){
        return view('home');
    }

    public function about(){
        return view('about');
    }

    public function contact(){
        return view('contact');
    }

    public function logs(){
        $logs = file_get_contents(storage_path('logs/clicked.log'));
        return view('logs', compact('logs'));
    }

}
