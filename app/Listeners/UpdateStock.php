<?php

namespace App\Listeners;

use App\Events\OrderCreated;
use App\Models\Stock;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateStock
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
     
        $product = Stock::where('product_name', $event->order->product_name)->first();

        $product->update([
            'quantity' => $product->quantity - $event->order->quantity
        ]);
        echo 1;die;
    }
}
