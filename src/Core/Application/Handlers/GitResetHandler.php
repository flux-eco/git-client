<?php

namespace FluxEco\GitClient\Core\Application\Handlers;

use FluxEco\GitClient\Core\{Ports};

class GitResetHandler
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

    public function handle(GitResetCommand $command) : void
    {
        $goToCommand = 'cd ' . $command->getComponentDirectoryPath();
        $gitReset = 'git reset -hard origin/' . $command->getBranchName();

        $this->shellExecutorClient->execute([$goToCommand, $gitReset]);
    }
}