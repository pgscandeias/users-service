<?php

namespace Candeias\Users;

use Candeias\Users\Event\Event;

class UserAggregate implements Aggregate
{
    /**
     * @var Entity\User
     */
    protected $user;

    /**
     * @var Input\Validator
     */
    protected $validator;

    public function __construct(Input\Validator $validator)
    {
        $this->validator = $validator;
    }

    public function register(Command\Command $command)
    {
        $this->user = Entity\User::fromArray($command->getPayload());
        $this->validator->validate($this->user, $command->getType());

        return [
            new Event(
                Event::REGISTERED,
                $command->getTime(),
                $command->getToken()
            ),
        ];
    }

    public function getEntity()
    {
        return $this->user;
    }
}
