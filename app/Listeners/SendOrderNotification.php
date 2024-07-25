<?php

namespace App\Listeners;

use App\Events\OrderCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendOrderNotification implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(OrderCreated $event): void
    {
      $data = ['order' => $event->order];
      Mail::send('mail', $data, function($message){
          $message->to('khaitocchien2004@gmail.com','Cao Quoc Khai')
          ->subject('Laravel Basic SendNotification Mail');
      });
      Log::debug("Basic Email Sent. Check your inbox.");    
    }
}
