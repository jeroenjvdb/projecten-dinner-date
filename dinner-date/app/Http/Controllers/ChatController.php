<?php

namespace App\Http\Controllers;

use App\Chat;
use App\Friend;
use App\User;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ChatController extends Controller
{
    /**
     * @var Chat
     */
    protected $chat;

    /**
     * @var Friend
     */
    protected $friend;

    /**
     * @var User
     */
    protected $user;

    /**
     * ChatController constructor.
     * @param Chat $chat
     * @param Friend $friend
     * @param User $user
     */
    public function __construct(Chat $chat, Friend $friend, User $user)
    {
        $this->chat = $chat;
        $this->friend = $friend;
        $this->user = $user;
    }

    public function getChat()
    {
        $friends = $this->user->find(Auth::id())
            ->friends()
            ->get() ;

        return view('functions.chat')->with(['friends' =>$friends]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function index($id)
    {
        $messages = Chat::where('sender_id', '=', $id)->orwhere('receiver_id', '=', $id)->get();
        foreach($messages as $message)
        {
            $message->sender = $message->sender()->first();
        }

        return response()->json($messages);
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create($id, Request $request)
    {
        // return 'jej';
        $message = new Chat;

        $message->message = $request->input('input');
        $message->sender_id = Auth::user()->id;
        $message->receiver_id = $id;
        $message->save();
        
        return response()->json($message);
    }
}
