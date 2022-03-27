<?php

namespace FluxEco\GitClient\Core\Application\Handlers;

use FluxEco\GitClient\Core\{Ports};

class GitPushHandler
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

    public function handle(GitPushCommand $command) : void
    {
        $goToCommand = 'cd ' . $command->getComponentDirectoryPath();
        $gitCommand = 'git push';

        $this->shellExecutorClient->execute([$goToCommand, $gitCommand]);
    }
}