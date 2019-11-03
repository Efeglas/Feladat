<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emails extends Model
{
    protected $fillable = ['email'];

    protected $primaryKey = 'email_id';

    public function emailsent()
    {
        return $this->hasMany('App\EmailSent', 'email_id', 'email_id');
    }


}
