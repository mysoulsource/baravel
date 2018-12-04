<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Request as Donate;
use App\User;

class SendResponseEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $donate;
    public $requested_to;
    public $requested_by;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Donate $donate)
    {
        $this->donate = $donate;
        $this->requested_to = User::findOrFail($this->donate->requested_to);
        $this->requested_by = User::findOrFail($this->donate->requested_by);
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('RequestResponse.'.$this->requested_by->id);
    }
    public function broadcastAs(){
        return 'RequestResponseEvent';
    }
    public function broadcastWith(){



        return [
            'requested_to' => $this->requested_to->name,
            'on' => $this->donate->updated_at->toFormattedDateString(),
        ];

    }
}
