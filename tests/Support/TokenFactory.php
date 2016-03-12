<?php

namespace Tests\Candeias\Users\Support;

use Candeias\Users\Security\AnonymousToken;
use Candeias\Users\Security\UserToken;

class TokenFactory
{
    public static function createUser()
    {
        return new UserToken('user');
    }

    public static function createAnonymous()
    {
        return new AnonymousToken('anonymous');
    }
}
