<?php

namespace App\Http\Controllers;

use App\Models\Memo;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MemoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function showHome(Request $request)
    {
        $user = User::find(Auth::id());
        $memos = $user->memo;
        $cond_title = $request->keyword;
        if($cond_title != '') {
            $notes = Memo::where('title','like','%'.$cond_title.'%')->where('user_id', Auth::id())->orderBy('created_at','desc')->paginate(5);
        } else {
            $notes = Memo::where('user_id', Auth::id())->orderBy('created_at', 'desc')->paginate(5);
        }
        
        return view('home', ['notes' => $notes]);
    }

    public function showSubmit($id = 0)
    {
        if ($id != 0) {
            $note = Memo::where('id', $id)->get()->first();
        } else {
            $note = (object) ["id" => 0, "title" => "", "content" => ""];
        }
        return view("submit", ['note' => $note]);
    }

    // public function store(Request $request)
    // {
    //     $memo = new Memo();
    //     $memo->user_id = $request->user()->id;
    //     $memo->title = $request->input('title');
    //     $memo->content = $request->input('content');
    //     $memo->save();

    //     return redirect('home');
    // }

    public function postSubmit(Request $request, $id = 0)
    {
        

        if ($id == 0) {
            $note = new Memo();
            $note->title = $request->input('title');
            $note->content = $request->input('content');
            $note->user_id = $request->user()->id;
            $note->save();
        } else {
            $note = Memo::find($id);
            $note = new Memo();
            $note->title = $request->input('title');
            $note->content = $request->input('content');
            $note->user_id = $request->user()->id;
            $note->save();
        }
        return redirect()->route('home');
    }

    public function delete($id)
    {
        Memo::find($id)->delete();
        return redirect()->route('home');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
