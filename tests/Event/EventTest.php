<?php

namespace Tests\Candeias\Users\Event;

use DateTime;
use Tests\Candeias\Users\Support;
use Candeias\Users\Security\Token;
use Candeias\Users\Event\Event;
use Candeias\Users\Aggregate;

class EventTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider eventProvider
     */
    public function testEvent(
        Aggregate $aggregate,
        $type,
        DateTime $time,
        Token $user,
        array $payload
    ) {
        $event = (new Event($type, $time, $user, $payload))->setAggregate($aggregate);

        $this->assertEquals($aggregate, $event->getAggregate());
        $this->assertEquals($type, $event->getType());
        $this->assertEquals($time, $event->getTime());
        $this->assertEquals($user, $event->getToken());
        $this->assertEquals($payload, $event->getPayload());

        foreach ($payload as $key => $value) {
            $this->assertEquals($value, $event->get($key));
        }

        $this->assertNull($event->get('key does not exist so we get null'));
    }

    public function eventProvider()
    {
        $aggregate = $this->prophesize(Aggregate::class)->reveal();

        return [
            [
                $aggregate,
                Event::REGISTERED,
                new DateTime,
                Support\TokenFactory::createAnonymous(),
                [],
            ],
        ];
    }
}
