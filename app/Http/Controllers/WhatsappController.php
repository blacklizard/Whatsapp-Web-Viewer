<?php

namespace blacklizard\Http\Controllers;

use blacklizard\Whatsapp\Models\Chat;
use blacklizard\Whatsapp\Models\Message;

class WhatsappController extends Controller
{
    /**
     * @var Chat
     */
    private $chat;
    /**
     * @var Message
     */
    private $message;

    /**
     * Create new instance of WhatsappController
     *
     * @param Chat $chat
     * @param Message $message
     */
    function __construct(Chat $chat, Message $message)
    {
        $this->chat = $chat;
        $this->message = $message;
    }

    /**
     * Get chat list
     *
     * @return Response
     */
    public function getChat()
    {
        $chats = $this->chat->orderBy('sort_timestamp', 'desc')->get();

        return view('chat')->with(compact('chats'));
    }

    /**
     * Get messages for a specific chat
     *
     * @param $chat
     * @return Response
     */
    public function getMessage($chat)
    {
        $chats = $this->chat->orderBy('sort_timestamp', 'desc')->get();
        $messages = $this->message->where('key_remote_jid', $chat)->orderBy('timestamp', 'asc')->get();

        return view('chat')->with(compact('chats', 'messages'));
    }
}