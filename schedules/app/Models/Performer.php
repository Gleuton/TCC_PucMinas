<?php

namespace App\Models;

class Performer extends User
{
    protected $fillable = [];
    protected $hidden = ['api_token', 'login', 'api_token_expiration'];

}
