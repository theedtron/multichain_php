<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payload extends Model
{
    //
    protected $table = 'payloads';

    protected $fillable = ['data'];
}
