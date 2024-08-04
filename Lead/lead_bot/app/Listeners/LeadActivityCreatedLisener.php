<?php

namespace App\Listeners;

use App\Events\LeadActivityCreatedEvent;
use GuzzleHttp\Client;

class LeadActivityCreatedLisener
{
    public function handle(LeadActivityCreatedEvent $event)
    {
        $leadActivity = $event->leadActivity;
        $lead = $leadActivity->lead;

        $chatId = $lead->chat_id;
        $messageId = $lead->message_id;
        $description = $leadActivity->description;

        $this->sendTelegramMessage($chatId, $description, $messageId);
    }

    protected function sendTelegramMessage($chatId, $message, $replyToMessageId = null)
    {
        $client = new Client();
        $client->post("https://api.telegram.org/bot7334882461:AAHv_M-4XlTTxdJAWvxo4hbw514Ydu2sp8E/sendMessage", [
            'json' => [
                'chat_id' => -1002169468632,
                'text' => $message,
                'reply_to_message_id' => $replyToMessageId,
            ]
        ]);
    }
}
