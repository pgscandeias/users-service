<?php

namespace Candeias\Users;

interface Aggregate
{
    public function register(Command\Command $command);

    public function getEntity();
}
