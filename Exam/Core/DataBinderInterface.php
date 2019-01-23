<?php

namespace Core;


interface DataBinderInterface
{
    public function bind(array $from, $className);

}