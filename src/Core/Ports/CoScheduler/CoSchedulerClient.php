<?php

namespace FluxEco\GitClient\Core\Ports\CoScheduler;

interface CoSchedulerClient
{
    public function getCoScheduler() : CoScheduler;
}
