<?php

namespace Tests\Candeias\Users\Command;

use DateTime;
use Tests\Candeias\Users\Support;
use Candeias\Users\Entity\User;
use Candeias\Users\Command\Command;

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
        $this->assertEquals($data, $command->getData());

        foreach ($data as $key => $value) {
            $this->assertEquals($value, $command->get($key));
        }

        $this->assertNull($command->get('key does not exist so we get null'));
    }

    public function commandProvider()
    {
        return [
            [
                Command::REGISTER,
                new DateTime,
                Support\UserFactory::createAnonymous(),
                [
                    'username' => 'user',
                    'password' => 'pass',
                ],
            ],
            [
                Command::UPDATE,
                new DateTime,
                Support\UserFactory::create(),
                [
                    'username' => 'user',
                    'password' => 'pass',
                ],
            ],
        ];
    }
}
