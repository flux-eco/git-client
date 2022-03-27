<?php

namespace FluxEco\GitClient\Core\Ports\CoScheduler;

interface CoScheduler
{
    public function add(callable $callable, ...$params) : void;

    public function start() : void;
}
