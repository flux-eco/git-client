<?php

namespace FluxEco\GitClient\Core\Application\Processes;

use FluxEco\GitClient\Core\{Application\Handlers, Ports};

/**
 * Class GitCheckoutCommitAndPublishProcess
 * @author Martin Studer <martin@fluxlabs.ch>
 */
class GitCheckoutCommitAndPublishProcess
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

        $command = Handlers\GitCommitCommand::new(
            $command->getComponentDirectoryPath(),
            $processCommand->getCommitMessage()
        );
        Handlers\GitCommandHandler::new($this->shellExecutorClient)->handle($command);

        $command = Handlers\GitPushCommand::new(
            $processCommand->getComponentDirectoryPath()
        );
        Handlers\GitPushHandler::new($this->shellExecutorClient)->handle($command);
    }
}