<?php

namespace Tests\Candeias\User;

use Prophecy\Argument;
use Tests\Candeias\Users\Support;
use Candeias\Users\UserAggregate;
use Candeias\Users\Command\Command;
use Candeias\Users\Event\Event;
use Candeias\Users\Entity\User;
use Candeias\Users\Input\Validator;

class UserAggregateTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Validator
     */
    protected $validator;

    public function setUp()
    {
        $this->validator = $this->prophesize(Validator::class);
    }

    public function test_register()
    {
        $command = Support\CommandFactory::create([
            'type' => Command::REGISTER,
            'data' => [
                'username' => 'user',
                'password' => 'pass'
            ],
        ]);

        // We should validate input data
        $this->validator
            ->validate(Argument::type(User::class), $command->getType())
            ->shouldBeCalled()
        ;

        // Assuming all goes well, event(s) should be returned
        $aggregate = $this->getAggregate();
        $events = $aggregate->register($command);
        $this->assertEquals(1, count($events));
        $event = $events[0];
        $this->assertInstanceOf(Event::class, $event);
        $this->assertEquals(Event::REGISTERED, $event->getType());

        // Also, our aggregate should now hold a User
        $user = $aggregate->getEntity();
        $this->assertInstanceOf(User::class, $user);
        // If one of the properties made it through, we're good
        $this->assertEquals($command->get('username'), $user->getUsername());
    }

    protected function getAggregate()
    {
        return new UserAggregate(
            $this->validator->reveal()
        );
    }

}
