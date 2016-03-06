<?php

namespace Candeias\Users\Entity;

class User
{
    /**
     * @var string
     */
    protected $username;

    public function __construct($username)
    {
        $this->username = $username;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public static function fromArray(array $data)
    {
        return new self($data['username']);
    }
}
