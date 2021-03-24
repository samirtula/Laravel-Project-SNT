<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsRequest;
use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function addNew(Request $req)
    {
        $new = new News();
        $new->header = $req->input('header');
        $new->text = $req->input('text');
        $new->keyword = $req->input('keyword');

        if ($req->hasFile('image')) {

            $allowExtensions = ['jpg', 'jpeg', 'png'];
            $inPublicPath = '/uploads/news/';
            $path = public_path() . $inPublicPath;
            $picture = $req->file('image');
            $fileName = (md5(date('Y-m-d H:i:s')));
            $extension = $picture->extension();

            if (in_array($extension, $allowExtensions)) {
                $picture->move($path, $fileName . '.' . $extension);
                $new->img_path = $inPublicPath . $fileName . '.' . $extension;
                $new->save();
                $result = redirect()->route('admin_news')->with('success', 'Данные добавлены');
            } else {
                $result = 'Некорректный формат файла';
            }

        } else {
            $new->save();
            $result = redirect()->route('admin_news')->with('success', 'Данные добавлены');
        }
        return $result;
    }

    public function showNews()
    {
        // dd(News::all());
        $new = new News;
        return view('news', ['data' => $new->orderBy('created_at', 'desc')->get()]);
    }

    public function showOneNew($id)
    {
        $new = new News;
        return view('new', ['data' => $new->find($id)]);
    }

    public function showNewsAdmin()
    {
        //dd(News::all());
        $new = new News;
        return view('admin.admin_news', ['data' => $new->orderBy('created_at', 'desc')->get()]);
    }

    public function adminNewsUpdate($id)
    {
        $new = new News;
        return view('admin.admin_news_update', ['data' => $new->find($id)]);
    }

    public function adminNewsUpdateSave($id, Request $req)
    {
        $new = News::find($id);
        $new->header = $req->input('header');
        $new->text = $req->input('text');
        $new->keyword = $req->input('keyword');

        if ($req->hasFile('image')) {

            $allowExtensions = ['jpg', 'jpeg', 'png'];
            $inPublicPath = '/uploads/news/';
            $path = public_path() . $inPublicPath;
            $picture = $req->file('image');
            $fileName = (md5(date('Y-m-d H:i:s')));
            $extension = $picture->extension();

            if (in_array($extension, $allowExtensions)) {
                $picture->move($path, $fileName . '.' . $extension);
                $new->img_path = $inPublicPath . $fileName . '.' . $extension;
                $new->save();
                $result = redirect()->route('admin_news')->with('success', 'Данные изменены');
            } else {
                $result = 'Некорректный формат файла';
            }

        } else {
            $new->save();
            $result = redirect()->route('admin_news')->with('success', 'Данные изменены');
        }
        return $result;
    }

    public function adminNewsDelete($id)
    {
        $new = (News::find($id));
        if ($new->img_path != 'No') {
            $path = $new->img_path;
            unlink(public_path($path));
        }

        $new->delete();
        return redirect()->route('admin_news')->with('success', 'Данные удалены');

    }

}
