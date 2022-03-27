<?php

namespace FluxEco\GitClient\Adapters\CoScheduler;

use FluxEco\GitClient\Core\{Ports};

class CoSchedulerClient implements Ports\CoScheduler\CoSchedulerClient
{
    private function __construct()
    {

    }

    public static function new()
    {
        return new self();
    }

    public function getCoScheduler() : CoScheduler
    {
        return CoScheduler::new();
    }
}
