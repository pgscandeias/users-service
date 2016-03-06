<?php

namespace Candeias\Users\Input;

interface Validator
{
    public function validate($data, $group);
}
