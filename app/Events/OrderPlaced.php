<?php

namespace App\Events;

use App\Models\Order;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;

class OrderPlaced implements ShouldBroadcast
{
    use SerializesModels;

    public function __construct(public Order $order) {}

    public function broadcastOn(): array
    {
        // Kirim ke channel seller yang bersangkutan
        return [
            new PrivateChannel('seller.' . $this->order->items->first()->product->seller_id),
        ];
    }

    public function broadcastWith(): array
    {
        return [
            'order_number' => $this->order->order_number,
            'total'        => $this->order->total,
            'buyer_name'   => $this->order->user->name,
            'items_count'  => $this->order->items->count(),
        ];
    }
}