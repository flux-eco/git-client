<?php

namespace FluxEco\GitClient\Core\Application\Handlers;

use FluxEco\GitClient\Core\{Ports};

class GitFetchHandler
{
    private Ports\ShellExecutor\ShellExecutorClient $shellExecutorClient;

    private function __construct(Ports\ShellExecutor\ShellExecutorClient $shellExecutorClient)
    {
        $this->shellExecutorClient = $shellExecutorClient;
    }

    public static function new(Ports\ShellExecutor\ShellExecutorClient $shellExecutorClient)
    {
        return new self($shellExecutorClient);
    }

    public function handle(GitFetchCommand $command) : void
    {
        $goToCommand = 'cd ' . $command->getComponentDirectoryPath();
        $gitCommand = 'git fetch';

        $this->shellExecutorClient->execute([$goToCommand, $gitCommand]);
    }
}