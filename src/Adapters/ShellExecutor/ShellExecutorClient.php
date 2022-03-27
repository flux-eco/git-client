<?php

namespace FluxEco\GitClient\Adapters\ShellExecutor;

use FluxEco\GitClient\Core\{Ports};
use FluxEco\ShellExecutor\Adapters\Api\ShellExecutorApi;

class ShellExecutorClient implements Ports\ShellExecutor\ShellExecutorClient
{

    private ShellExecutorApi $shellExecutorApi;

    private function __construct()
    {
        $this->shellExecutorApi = ShellExecutorApi::new();
    }

    public static function new()
    {
        return new self();
    }

    public function execute(array $commandQueue) : void
    {
        $this->shellExecutorApi->execute($commandQueue);
    }
}
