<?php

namespace Tests\Candeias\Users\Command;

use DateTime;
use Candeias\Users\Command\Command;
use Candeias\Users\Entity\User;

class CommandTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider commandProvider
     */
    public function testCommand($type, DateTime $time, User $user, array $data)
    {
        $command = new Command($type, $time, $user, $data);

        $this->assertEquals($type, $command->getType());
        $this->assertEquals($time, $command->getTime());
        $this->assertEquals($user, $command->getUser());

        foreach ($data as $key => $value) {
            $this->assertEquals($value, $command->get($key));
        }

        $this->assertNull($command->get('key does not exist so we get null'));
    }

    public function commandProvider()
    {
        return [
            [
                'register',
                new DateTime,
                new User,
                [
                    'username' => 'user',
                    'password' => 'pass',
                ],
            ],
        ];
    }
}
