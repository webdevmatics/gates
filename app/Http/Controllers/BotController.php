<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BotController extends Controller
{
    public function bot(Request $request)
    {
        $data = $request->all();
        //get the user’s id
        $id            = $data["entry"][0]["messaging"][0]["sender"]["id"];
        $senderMessage = $data["entry"][0]["messaging"][0]['message'];
        if (!empty($senderMessage)) {
            $this->sendTextMessage($id, "Hi buddy");
        }
    }

    private function sendTextMessage($recipientId, $messageText)
    {
        $messageData = [
            "recipient" => [
                "id" => $recipientId,
            ],
            "message"   => [
                "text" => $messageText,
            ],
        ];
        $ch = curl_init('https://graph.facebook.com/v2.6/me/messages?access_token=' . env("PAGE_ACCESS_TOKEN"));
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type: application/json"]);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($messageData));
        curl_exec($ch);
        curl_close($ch);

    }
}
