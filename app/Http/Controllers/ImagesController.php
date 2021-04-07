<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Images;

class ImagesController extends Controller
{
    public function addImage(Request $req)
    {

        if ($req->hasFile('image')) {
            $img = new Images();
            $img->description = $req->input('keyword');
            $allowExtensions = ['jpg', 'jpeg', 'png'];
            $inPublicPath = '/uploads/gallery/';
            $path = public_path() . $inPublicPath;
            $picture = $req->file('image');
            $fileName = (md5(date('Y-m-d H:i:s')));
            $extension = $picture->extension();

            if (in_array($extension, $allowExtensions)) {
                $picture->move($path, $fileName . '.' . $extension);
                $img->img_path = $inPublicPath . $fileName . '.' . $extension;
                $img->save();
                $result = redirect()
                    ->route('admin_images')
                    ->with('success', 'Данные были добавлены');
            } else {
                $result = redirect()
                    ->route('admin_images')
                    ->with('error', 'Некорректный формат файла');
            }

        } else {
            $result = redirect()
                ->route('admin_images')
                ->with('error', 'Файл не прикреплен');
        }
        return $result;
    }

    public function showImages()
    {
        return view('gallery', ['data' => Images::all()]);
    }

    public function showImagesAdmin()
    {
        $img = new Images();
        return view('admin.admin_images', ['data' => $img
            ->orderBy('created_at', 'desc')
            ->get()]);
    }

    public function adminImagesDelete($id)
    {
        $img = (Images::find($id));

        $path = $img->img_path;
        unlink(public_path($path));

        $img->delete();

        return redirect()
            ->route('admin_images')
            ->with('success', 'Данные удалены');
    }
}
