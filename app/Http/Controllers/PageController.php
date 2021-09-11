<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{


    public function index()
    {
        // return view('pages.index');

        // To pass in a value to the View
        $title = 'Welcome To LSAPP';
        return view('pages.index', compact('title'));
        // OR
        // return view('pages.index')->with('title', $title);

    }//end index()


    public function about()
    {
        return view('pages.about');

    }//end about()


    public function services()
    {
        $data =[
            'title' => 'Services',
            'services'=> ['Web Design', 'Programming', 'SEO']
        ];
        return view('pages.services')->with($data);


    }//end services()


}//end class
