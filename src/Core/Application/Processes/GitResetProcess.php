<?php

namespace FluxEco\GitClient\Core\Application\Processes;

use FluxEco\GitClient\Core\{Application\Handlers, Ports};

/**
 * Class GitCheckoutCommitAndPublishProcess
 * @author Martin Studer <martin@fluxlabs.ch>
 */
class GitResetProcess
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

    public function process(GitCheckoutCommitAndPublishCommand $processCommand) : void
    {
        $command = Handlers\GitCheckoutCommand::new(
            $processCommand->getComponentDirectoryPath(),
            $processCommand->getBranchName()
        );
        Handlers\GitCheckoutHandler::new($this->shellExecutorClient)->handle($command);

        $command = Handlers\GitFetchCommand::new(
            $command->getComponentDirectoryPath(),
        );
        Handlers\GitFetchHandler::new($this->shellExecutorClient)->handle($command);

        $command = Handlers\GitResetCommand::new(
            $processCommand->getComponentDirectoryPath(),
            $processCommand->getBranchName()
        );
        Handlers\GitResetHandler::new($this->shellExecutorClient)->handle($command);
    }
}