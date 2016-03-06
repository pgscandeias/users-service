<?php

namespace Tests\Candeias\Users\Support;

use Candeias\Users\Security\AnonymousToken;
use Candeias\Users\Security\Token;

class TokenFactory
{
    public static function create()
    {
        return new Token('user');
    }

    public static function createAnonymous()
    {
        return new AnonymousToken('anonymous');
    }
}
