<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChatRequest;
use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ChatController extends Controller
{
    public function send(ChatRequest $request): JsonResponse
    {
        $user = User::where('device_uuid', $request->get('deviceUuid'))
            ->firstOrFail();

        if (!$user->is_premium && $user->chat_credits <= 0) {
            return response()->json(['error' => 'Insufficient credits'], 403);
        }

        Chat::firstOrCreate(
            ['chat_id' => $request->get('chatId')],
            ['user_id' => $user->id]
        );

        $user->chat_credits -= 1;
        $user->save();

        $response = $this->getAIResponse($request->get('message'));
        return response()->json([
            'response' => $response,
            'remainingCredits' => $user->chat_credits
        ]);
    }

    public function list(Request $request): JsonResponse
    {
        $user_chat_list = Chat::where('user_id', $request->get('userId'))
            ->get()
            ->map(function (object $chat) {
                return [
                    'id' => $chat->id,
                    'chatId' => $chat->chat_id,
                    'updatedAt' => Carbon::parse($chat->updated_at)->format('Y-m-d H:i'),
                    'createdAt' => Carbon::parse($chat->created_at)->format('Y-m-d H:i')
                ];
            });

        return response()->json(['chats' => $user_chat_list]);
    }

    private function getAIResponse($message): string
    {
        return "Response from AI:  " . $message;
    }
}
