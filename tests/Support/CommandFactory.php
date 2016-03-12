<?php

namespace Tests\Candeias\Users\Support;

use DateTime;
use Candeias\Users\Command;
use Candeias\Users\Entity\User;

class CommandFactory
{
    public static function create(array $values = [])
    {
        return new Command\Command(
            @$values['type'],
            @$values['time'] ?: new DateTime,
            @$values['user'] ?: TokenFactory::create(),
            @$values['data'] ?: []
        );
    }
}
