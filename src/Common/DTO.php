<?php

namespace Candeias\Users\Common;

use DateTime;
use Candeias\Users\Entity\User;

abstract class DTO
{
    /**
     * @var string
     */
    protected $type;

    /**
     * @var DateTime
     */
    protected $time;

    /**
     * @var User
     */
    protected $user;

    /**
     * @var array
     */
    protected $data;

    /**
     * @param string   $type
     * @param DateTime $time
     * @param User     $user
     * @param array    $data
     */
    public function __construct(
        $type,
        DateTime $time,
        User $user,
        array $data = []
    ) {
        $this->type = $type;
        $this->time = $time;
        $this->user = $user;
        $this->data = $data;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getTime()
    {
        return $this->time;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function getData()
    {
        return $this->data;
    }

    public function get($key)
    {
        return isset($this->data[$key]) ?
            $this->data[$key] :
            null
        ;
    }
}
