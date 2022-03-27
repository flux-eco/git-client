<?php

namespace FluxEco\GitClient\Core\Ports\Configs;

use  FluxEco\GitClient\Core\Ports;

interface Outbounds
{
    public function getShellClient() : Ports\ShellExecutor\ShellExecutorClient;
    public function getCoSchedulerClient() : Ports\CoScheduler\CoSchedulerClient;
}