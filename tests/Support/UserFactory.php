<?php

namespace Tests\Candeias\Users\Support;

use Candeias\Users\Entity\User;

class UserFactory
{
    public static function create()
    {
        return new User;
    }
}
