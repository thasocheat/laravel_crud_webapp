<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('frontpage.index');
    }

    public function adminHome()
    {
        return view('admin.adminHome');
    }

    public function managerHome()
    {
        return view('managerHome');
    }

    public function checkImageExists(){
        // Get the image file name from the request
        $imageFileName = $_GET['image'];

        // Define the directory where the images are stored
        $imageDirectory = 'storage/images_department';

        $imageFilePath = $imageDirectory . $imageFileName;

        error_log("Checking image existence for: " . $imageFilePath);
        // Check
        if(file_exists($imageFilePath)){
            echo 'true';
        }else{
            echo 'false';
        }

    }
}
