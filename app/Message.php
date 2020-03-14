<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    // メッセージ情報モデル
    protected $table = 'messages';

    protected $fillable = ['id', 'message', 'destination_id'];
}
