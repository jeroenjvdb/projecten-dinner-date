<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ChatEvent extends Event implements ShouldBroadcast
{
    use SerializesModels;

    /**
     * @var
     */
    public $id1;

    /**
     * @var
     */
    public $id2;

    /**
     * ChatEvent constructor.
     * @param $id1
     * @param $id2
     */
    public function __construct($id1, $id2)
    {
//        dd('test- event');

        $this->id1 = $id1;
        $this->id2 = $id2;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
          return ['chat-channel'];
    }
}
