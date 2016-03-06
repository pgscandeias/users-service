<?php

namespace Candeias\Users\Common;

use DateTime;
use Candeias\Users\Security\Token;

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
     * @var Token
     */
    protected $token;

    /**
     * @var array
     */
    protected $data;

    /**
     * @param string   $type
     * @param DateTime $time
     * @param Token     $token
     * @param array    $data
     */
    public function __construct(
        $type,
        DateTime $time,
        Token $token,
        array $data = []
    ) {
        $this->type = $type;
        $this->time = $time;
        $this->token = $token;
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

    public function getToken()
    {
        return $this->token;
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
