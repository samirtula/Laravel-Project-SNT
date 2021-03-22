<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MainMessage;

class MessageController extends Controller
{
    public function addMainMessage(Request $req)
    {
        $message = new MainMessage();
        $message->text = $req->input('text');
        $message->header = $req->input('header');
        $message->type = $req->input('type');

        $message->save();
        return redirect()->route('admin');

    }

    public function showMessagesAdmin()
    {
        //dd(News::all());
        $message = new MainMessage();
        return view('admin', ['data' => $message->orderBy('created_at', 'desc')->get()]);
    }

    public function showMessagesPublic()
    {
        //dd(News::all());
        $message = new MainMessage();
        return view('index', ['message' => $message->where('type', 'Объявление')->orderBy('created_at', 'desc')->first(), 'meeting'=> $message->where('type', 'Общее собрание')->orderBy('created_at', 'desc')->first()]);
    }

    public function adminUpdate($id)
    {
        $message = new MainMessage;
        return view('admin_update', ['data' => $message->find($id)]);
    }

    public function adminUpdateSave($id, Request $req)
    {
        $message = MainMessage::find($id);
        $message->header = $req->input('header');
        $message->text = $req->input('text');
        $message->save();
        return redirect()->route('admin')->with('success', 'Данные изменены');

    }
    public function adminDelete($id)
    {
        $message = (MainMessage::find($id));
        $message->delete();

        return redirect()->route('admin')->with('success', 'Данные удалены');
    }
}
