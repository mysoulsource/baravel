<?php

namespace App\Notifications;

use App\Demand;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use NotificationChannels\FacebookPoster\FacebookPosterChannel;
use NotificationChannels\FacebookPoster\FacebookPosterPost;

class DemandCreated extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [FacebookPosterChannel::class];
    }

    /**
     * @param $blog
     */
    public function toFacebookPoster($demand)
    {
        $bloodgroup = $demand->bloodName->name;
        $text = $bloodgroup . ' demanded by ' . $demand->user->name . ' on Date: ' . $demand->date . ' Location : ' . $demand->location ;
        $bloodimg = $demand->bloodName->image;
        $url = url('img/bloods/' . $bloodimg);
        

       
        return with(new FacebookPosterPost($text));
    }
}
