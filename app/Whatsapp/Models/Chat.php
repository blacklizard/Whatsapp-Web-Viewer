<?php

namespace blacklizard\Whatsapp\Models;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'chat_list';

    /**
     * Each chat has many messages
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messages()
    {
        return $this->hasMany(Message::class, 'key_remote_jid', 'key_remote_jid');
    }


}