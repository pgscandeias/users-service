<?php

namespace Tests\Candeias\Users\Support;

use Candeias\Users\Entity\AnonymousUser;
use Candeias\Users\Entity\User;

class TokenFactory
{
    public static function create()
    {
        return new User('user');
    }

    public static function createAnonymous()
    {
        return new AnonymousUser('anonymous');
    }
}
