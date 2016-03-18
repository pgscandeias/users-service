<?php

namespace Candeias\Users\Event;

use Candeias\Users\Common\DTO;
use Candeias\Users\Aggregate;

class Event extends DTO
{
    const REGISTERED = 'registered';

    /**
     * @var Aggregate
     */
    protected $aggregate;

    /**
     * @param  Aggregate $aggregate
     * @return self
     */
    public function setAggregate(Aggregate $aggregate)
    {
        $this->aggregate = $aggregate;
        return $this;
    }

    /**
     * @return Aggregate
     */
    public function getAggregate()
    {
        return $this->aggregate;
    }
}
