<?php

namespace FluxEco\GitClient\Core\Application\Handlers;

use FluxEco\GitClient\Core\{Ports};

class GitCheckoutHandler
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

    public function handle(GitCheckoutCommand $command) : void
    {
        $goToCommand = 'cd ' . $command->getComponentDirectoryPath();
        $gitCommand = 'git checkout -b ' . $command->getBranchName();

        $this->shellExecutorClient->execute([$goToCommand, $gitCommand]);
    }
}