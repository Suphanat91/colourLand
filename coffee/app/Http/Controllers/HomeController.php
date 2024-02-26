<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use App\Models\Chat;
use App\Models\User;
use App\Models\Replymas;
use App\Models\Orderlist;
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
        $comments = Comment::all(); // หรือจะดึงข้อมูลในรูปแบบอื่น ๆ ก็ได้
        $chat = Chat::all(); // หรือจะดึงข้อมูลในรูปแบบอื่น ๆ ก็ได้
        // $items = Item::all();
        $countorderlist = OrderList::where('status2', '1')->count();
        $countorderlist1 = OrderList::where('status2', '3')->count();
        $countorderlist2 = OrderList::where('status2', '5')->count();


        // นับจำนวนแถวข้อมูลที่ดึงมา
        $count = Comment::count();
        $count = Chat::count();
        
        $users = User::all();

        
        $userCount = $users->count();

// ส่งข้อมูลไปยัง view และแสดงผล
// return view('yourViewName', ['users' => $users, 'userCount' => $userCount]);


        // ส่งข้อมูลไปยัง View
        // return view('your.view', compact('items', 'count'));
        return view('home',  compact('comments','chat', 'count','userCount','countorderlist','countorderlist1','countorderlist2'));

        // $comments = Comment::all(); // หรือจะดึงข้อมูลในรูปแบบอื่น ๆ ก็ได้
        // return view('layouts.coffeetable', ['comments' => $comments]);
    }
    public function addform($id)
    {
        $reply = Replymas::all();
        $data = Chat::find($id);
        return view('replymas',compact('data','reply'));
        // return 'iii';
    }


    public function addreplymas(Request $request,$id)
    {
        $ob = new Replymas();
        $ob->replymas = $request ['replymas'];
        // $ob->user = $request ['user'];
        $ob->chat_idchat = $id;
        // $ob->massage = $mas;
        // dd($ob)
        $ob->save();
        return redirect("home");
    }

    
    
}
