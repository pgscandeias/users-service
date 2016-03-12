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
    protected $payload;

    /**
     * @param string   $type
     * @param DateTime $time
     * @param Token    $token
     * @param array    $payload
     */
    public function __construct(
        $type,
        DateTime $time,
        Token $token,
        array $payload = []
    ) {
        $this->type = $type;
        $this->time = $time;
        $this->token = $token;
        $this->payload = $payload;
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

    /**
     * Get an array of all the payload
     *
     * @return array
     */
    public function getPayload()
    {
        return $this->payload;
    }

    /**
     * Get only a single piece of payload, identified by its key
     *
     * @param  string $key
     * @return mixed
     */
    public function get($key)
    {
        return isset($this->payload[$key]) ?
            $this->payload[$key] :
            null
        ;
    }
}
