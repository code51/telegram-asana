<?php

namespace App\Http\Controllers;

use Exedra\Routeller\Attributes\Path;
use Longman\TelegramBot\Exception\TelegramException;
use Longman\TelegramBot\Telegram;

#[Path('/hook')]
class HookApiController extends BaseController
{
    #[Path('/register')]
    public function postRegister()
    {
        $apiKey  = '5928988249:AAFbUkLVby0EkI1PiGhQh4tBUK4l8QoVkjk';
        $username = 'qmsanBot';

        $hookUrl     = 'https://your-domain/path/to/hook.php';

        try {
            // Create Telegram API object
            $telegram = new Telegram($apiKey, $username);

            // Set webhook
            $result = $telegram->setWebhook($hookUrl);

            if ($result->isOk()) {
                echo $result->getDescription();
            }
        } catch (TelegramException $e) {
            // log telegram errors
            // echo $e->getMessage();
        }
    }

    #[Path('/listener')]
    public function getListener()
    {
        $apiKey  = '5928988249:AAFbUkLVby0EkI1PiGhQh4tBUK4l8QoVkjk';
        $username = 'qmsanBot';

        try {
            // Create Telegram API object
            $telegram = new Telegram($apiKey, $username);

            // Handle telegram webhook request
            $telegram->handle();
        } catch (TelegramException $e) {
            // Silence is golden!
            // log telegram errors
            // echo $e->getMessage();
        }
    }
}
