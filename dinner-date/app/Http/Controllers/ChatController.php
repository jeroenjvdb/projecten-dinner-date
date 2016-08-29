<?php

namespace App\Http\Controllers;

use App\Chat;
use App\Friend;
use App\Picture;
use App\User;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Events\ChatEvent;

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
     * @var
     */
    protected $picture;

    /**
     * ChatController constructor.
     * @param Chat $chat
     * @param Friend $friend
     * @param User $user
     * @param Picture $picture
     */
    public function __construct
    (
        Chat $chat,
        Friend $friend,
        User $user,
        Picture $picture
    ){
        $this->chat = $chat;
        $this->friend = $friend;
        $this->user = $user;
        $this->picture = $picture;
    }

    public function getChat()
    {
        $friends = $this->user->find(Auth::id())
            ->friends()
            ->get() ;
        foreach ($friends as $key => $friend)
        {
            $unseen = $this->chat->where('receiver_id',Auth::id())
                ->where('sender_id','=',$friend->id)
                ->where('seen',0)
                ->get();
            $friend->seen = 1;
            if(count($unseen)>0)
            {
                $friend->seen = 0;
            }
        }

        return view('functions.chat')->with(['friends' =>$friends]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function index($id)
    {
        $this->chat->where('receiver_id',Auth::id())
            ->where('sender_id',$id)
            ->update(['seen' => 1]);

        $messages = $this->chat->GetMessages($id)
            ->orderby('id','DESC')
            ->take(10)
            ->get();

        $messages = $messages->reverse();
        foreach($messages as $message)
        {
            $message->sender = $message->sender()->first();

            $pic = $this->picture->where('user_id','=',$message->sender_id)
                ->where('isDish','=',0)
                ->select('picture_url')
                ->first();
            $message->picture_sender = $pic;
            $pic = $this->picture->where('user_id','=',$message->receiver_id)
                ->where('isDish','=',0)
                ->select('picture_url')
                ->first();
            $message->picture_receiver = $pic;

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
        $message = new Chat;

        $message->message = $request->input('input');
        $message->sender_id = Auth::user()->id;
        $message->receiver_id = $id;
        $message->save();

        event(new ChatEvent(Auth::user()->id,$id));
        return response()->json($message);
    }

    /**
     * @return mixed
     */
    public function unseen()
    {
        $unseen = $this->chat->where('receiver_id',Auth::id())
            ->where('seen',0)
            ->get();
        return count($unseen);
    }
}
