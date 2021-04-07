<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForumController extends Controller
{
    public function addForum(Request $req)
    {
        $forum = new Forum();
        $forum->topic = $req->input('topic');
        $forum->message = $req->input('message');
        $forum->name = Auth::user()->name;
        $forum->last_name = Auth::user()->last_name;
        $forum->user_id = Auth::user()->id;

        $forum->save();
        return redirect()
            ->route('admin_forum')
            ->with('success', 'Форум добавлен');

    }

    public function adminShowForums()
    {
        $forum = new Forum();
        $data = $forum->groupBy('topic')->get();
        return view('admin.admin_forums', ['data' => $data]);
    }

    public function adminForumDelete($topic)
    {
        $forum = Forum::where('topic', $topic);
        $forum->delete();
        return redirect()
            ->route('admin_forum')
            ->with('success', 'Данные удалены');
    }

    public function showForumsTopicPublic()
    {
        $data = Forum::whereIn('id', function ($query) {
            $query->from('forums')->groupBy('topic')->selectRaw('MAX(id)');
        })->get();

        return view('forum', ['data' => $data]);
    }


    public function showDiscuss($topic)
    {
        $data = Forum::where('topic', $topic)->get();
        $topicName = $topic;
        return view('discuss', ['data' => $data, 'topic' => $topicName]);
    }

    public function addDiscussMessage(Request $req)
    {
        $message = new Forum();
        $message->message = $req->input('message');
        $message->topic = $req->input('topic');
        $message->name = Auth::user()->name;
        $message->last_name = Auth::user()->last_name;
        $message->user_id = Auth::user()->id;

        $message->save();
        return redirect()
            ->route('discuss', $req->input('topic'));
    }
    public function deleteDiscussMessage($id, $topic)
    {
        $forum = Forum::where('id', $id);
        $forum->delete();
        return redirect()->route('discuss', $topic);
    }

}
