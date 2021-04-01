<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Boards;

class BoardsController extends Controller
{
    public function addBoard(Request $req)
    {
        $board = new Boards();
        $board->header = $req->input('header');
        $board->text = $req->input('text');
        $board->keyword = $req->input('keyword');

        if ($req->hasFile('image')) {

            $allowExtensions = ['jpg', 'jpeg', 'png'];
            $inPublicPath = '/uploads/boards/';
            $path = public_path() . $inPublicPath;
            $picture = $req->file('image');
            $fileName = (md5(date('Y-m-d H:i:s')));
            $extension = $picture->extension();

            if (in_array($extension, $allowExtensions)) {
                $picture->move($path, $fileName . '.' . $extension);
                $board->img_path = $inPublicPath . $fileName . '.' . $extension;
                $board->save();
                $result = redirect()
                    ->route('admin_boards')
                    ->with('success', 'Данные добавлены');
            } else {
                $result = 'Некорректный формат файла';
            }

        } else {
            $board->save();
            $result = redirect()
                ->route('admin_boards')
                ->with('success', 'Данные добавлены');
        }
        return $result;
    }

    public function showBoards()
    {
        $board = new Boards;
        return view('boards', ['data' => $board
            ->orderBy('created_at', 'desc')
            ->get()]);
    }

    public function showOneBoard($id)
    {
        $board = new Boards();
        return view('board', ['data' => $board
            ->find($id)]);
    }

    public function showBoardsAdmin()
    {
        $board = new Boards();
        return view('admin.admin_boards', ['data' => $board
            ->orderBy('created_at', 'desc')->get()]);
    }

    public function adminBoardsUpdate($id)
    {
        $board = new Boards;
        return view('admin.admin_boards_update', ['data' => $board
            ->find($id)]);
    }

    public function adminBoardsUpdateSave($id, Request $req)
    {
        $board = Boards::find($id);
        $board->header = $req->input('header');
        $board->text = $req->input('text');
        $board->keyword = $req->input('keyword');

        if ($req->hasFile('image')) {

            $allowExtensions = ['jpg', 'jpeg', 'png'];
            $inPublicPath = '/uploads/boards/';
            $path = public_path() . $inPublicPath;
            $picture = $req->file('image');
            $fileName = (md5(date('Y-m-d H:i:s')));
            $extension = $picture->extension();

            if (in_array($extension, $allowExtensions)) {
                $picture->move($path, $fileName . '.' . $extension);
                $board->img_path = $inPublicPath . $fileName . '.' . $extension;
                $board->save();
                $result = redirect()
                    ->route('admin_boards')
                    ->with('success', 'Данные изменены');
            } else {
                $result = 'Некорректный формат файла';
            }

        } else {
            $board->save();
            $result = redirect()
                ->route('admin_boards')
                ->with('success', 'Данные изменены');
        }
        return $result;
    }

    public function adminBoardsDelete($id)
    {
        $board = Boards::find($id);
        if (!empty($board->img_path)) {
            $path = $board->img_path;
            unlink(public_path($path));
        }

        $board->delete();

        return redirect()
            ->route('admin_boards')
            ->with('success', 'Данные удалены');
    }
}
