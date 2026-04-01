<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

use App\Models\Order;

// Seller hanya bisa listen channel miliknya sendiri
Broadcast::channel('seller.{sellerId}', function ($user, $sellerId) {
    return (int) $user->id === (int) $sellerId;
});

// Buyer hanya bisa listen order miliknya sendiri
Broadcast::channel('orders.{orderId}', function ($user, $orderId) {
    $order = Order::find($orderId);
    return $order && (int) $order->user_id === (int) $user->id;
});