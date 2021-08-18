<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;

class Nudata extends BaseModel
{
    protected $table =  'nudatas';

    protected $fillable = [
        'fileno',
        'filename',
        'subject',
        'filecomedate',
        'filecomefrom',
        'filemark',
        'filego',
        'filegodate',
        'filelawgodate',
        'filelawcomedate',
        'comments'
    ];
}
