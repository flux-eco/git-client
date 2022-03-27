<?php

namespace FluxEco\GitClient\Core\Application\Handlers;

use FluxEco\GitClient\Core\{Ports};

class GitCommandHandler
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

    public function handle(GitCommitCommand $command) : void
    {
        $goToCommand = 'cd ' . $command->getComponentDirectoryPath();
        $gitAddCommand = 'git add *' ;
        $gitCommitCommand = 'git commit -m "' . $command->getCommitMessage().'"';

        $this->shellExecutorClient->execute([$goToCommand, $gitAddCommand, $gitCommitCommand]);
    }
}