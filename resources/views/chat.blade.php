@extends('app')

@inject('media', 'blacklizard\Whatsapp\Services\Media')

@section('content')

    <style>

        .me, .from {
            margin-top: 10px;
            margin-bottom: 10px;
            padding: 5px;
        }

        .me > span {
            text-align: right;
            background-color: #dcf8c6;
            -webkit-box-shadow: 0px 0px 2px 0px rgba(0, 0, 0, 0.75);
            -moz-box-shadow: 0px 0px 2px 0px rgba(0, 0, 0, 0.75);
            box-shadow: 0px 0px 2px 0px rgba(0, 0, 0, 0.75);
        }

        .from > span {
            text-align: left;
            -webkit-box-shadow: 0px 0px 2px 0px rgba(0, 0, 0, 0.75);
            -moz-box-shadow: 0px 0px 2px 0px rgba(0, 0, 0, 0.75);
            box-shadow: 0px 0px 2px 0px rgba(0, 0, 0, 0.75);
        }

        .me > span, .from > span {
            width: 70%;
            display: block;
            border-radius: 5px;
            padding: 10px;
        }

        .chat-list {
            /*padding: 10px;*/
            -webkit-box-shadow: 0px 0px 2px 0px rgba(0, 0, 0, 0.75);
            -moz-box-shadow: 0px 0px 2px 0px rgba(0, 0, 0, 0.75);
            box-shadow: 0px 0px 2px 0px rgba(0, 0, 0, 0.75);
        }

        .chat-list > li {
            padding: 5px;
            padding-left: 15px;
            border-bottom: 1px solid #DDDDDD;
        }

        .messages {
            border-right: 1px solid #DDDDDD;
        }
    </style>

    <div class="row">
        <div class="columns large-4">
            <ul class="no-bullet chat-list">
                @foreach($chats as $chat)
                    <li>
                        <a href="/chat/{{$chat->key_remote_jid}}">
                            @if($chat->subject)
                                {{$chat->subject}}
                            @else
                                {{ str_replace('@s.whatsapp.net','',$chat->key_remote_jid) }}
                            @endif
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="columns large-8 messages">
            @if(isset($messages))
                @foreach($messages as $message)
                    @if($message->data)
                        <div style="" class="@if($message->key_from_me == 1) me clearfix @else from @endif">

                            <span class="@if($message->key_from_me == 1) right @endif">
                                    {{$message->data}}
                            </span>
                        </div>
                    @endif
                @endforeach
            @endif
        </div>
    </div>

@endsection