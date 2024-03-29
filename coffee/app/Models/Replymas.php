<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Replymas extends Model
{
    use HasFactory;
    protected $table = 'replymas';
    protected $primaryKey = 'idreplymas';

    public function chat()
    {
        return $this->belongsTo(Chat::class, 'chat_idchat');
    }
}
