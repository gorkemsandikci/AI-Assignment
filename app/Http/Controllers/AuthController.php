<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function login(AuthRequest $request): JsonResponse
    {
        $user = User::where('device_uuid', $request->get('deviceUuid'))->first();

        if ($user === null) {
            User::create([
                'device_uuid' => $request->get('deviceUuid'),
                'device_name' => $request->get('deviceName')
            ]);

            $user = User::where('device_uuid', $request->get('deviceUuid'))->first();
        }

        return response()->json([
            'device' => $user->device_name,
            'isPremium' => $user->is_premium === 1,
            'chatCredits' => $user->chat_credits,
        ]);
    }
}
