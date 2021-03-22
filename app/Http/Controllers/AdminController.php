<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    public function showUsers (Request $req)
    {
        return view('admin_users');
    }

   /* public function showNews(Request $req)
    {
        return view('admin_news');
    }*/

    public function showBoards(Request $req)
    {
        return view('admin_boards');
    }
    public function showDocs(Request $req)
    {
        return view('admin_docs');
    }
    public function showImages(Request $req)
    {
        return view('admin_images');
    }
}
