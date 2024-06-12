<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscriptionRequest;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class SubscriptionController extends Controller
{
    public function store(SubscriptionRequest $request): JsonResponse
    {
        $user = User::where('device_uuid', $request->get('deviceUuid'))->first();

        Subscription::whereNotExits('user_id', $user->id)
            ->create([
            'user_id' => $user->id,
            'product_id' => $request->get('productId'),
            'receipt_token' => $request->get('receiptToken'),
        ]);

        $user->is_premium = 1;
        $user->chat_credits += 100;
        $user->save();

        return response()->json([
            'status' => 'success',
            'isPremium' => $user->is_premium === 1,
            'chatCredits' => $user->chat_credits
        ]);
    }
}
