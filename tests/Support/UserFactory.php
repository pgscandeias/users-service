<?php

namespace Tests\Candeias\Users\Support;

use Candeias\Users\Entity\AnonymousUser;
use Candeias\Users\Entity\User;

class UserFactory
{
    public static function create()
    {
        return new User;
    }

    public static function createAnonymous()
    {
        return new AnonymousUser;
    }
}
