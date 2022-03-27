<?php

namespace FluxEco\GitClient\Adapters\Configs;

use FluxEco\GitClient\{Adapters, Core\Ports};

class Outbounds implements Ports\Configs\Outbounds
{

    private function __construct()
    {

    }

    public static function new() : self
    {
        return new self();
    }

    public function getShellClient() : Ports\ShellExecutor\ShellExecutorClient
    {
        return Adapters\ShellExecutor\ShellExecutorClient::new();
    }

    public function getCoSchedulerClient() : Ports\CoScheduler\CoSchedulerClient
    {
        return Adapters\CoScheduler\CoSchedulerClient::new();
    }
}